<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Image;

class PengaturanController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $pengaturan = Pengaturan::orderBy('id','DESC')->paginate(25)->onEachSide(1);
		return view('admin.pengaturan.index',compact('pengaturan'));
    }

    ## Tampilkan Form Edit
    public function edit(Pengaturan $pengaturan)
    {
        $view=view('admin.pengaturan.edit', compact('pengaturan'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Pengaturan $pengaturan)
    {
        $this->validate($request, [
            'judul' => 'required',
            'file' => 'mimes:pdf|max:20000',
        ]);

        if ($pengaturan->file && $request->file('file') != "") {
            $file_path = public_path() . '/upload/pengaturan/' . $pengaturan->file;
            unlink($file_path);
        }

        $pengaturan->fill($request->all());
        
		if($request->file('file') != ""){
            $filename = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/pengaturan'), $filename);
            $pengaturan->file = $filename;
		}
        
        $pengaturan->save();
		
		return redirect('/pengaturan')->with('status', 'Data Berhasil Diubah');
    }

}
