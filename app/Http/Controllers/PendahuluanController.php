<?php

namespace App\Http\Controllers;

use App\Models\Pendahuluan;   //nama model
use Maatwebsite\Excel\Facades\Excel; // Excel Library
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Image;
use PDF;

class PendahuluanController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index()
    {
        $title = "Pendahuluan";
        $pendahuluan = Pendahuluan::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.pendahuluan.index',compact('title','pendahuluan'));
    }

    ## Tampilkan Form Edit
    public function edit(Pendahuluan $pendahuluan)
    {
        $title = "Pendahuluan";
        $view=view('admin.pendahuluan.edit', compact('title','pendahuluan'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Pendahuluan $pendahuluan)
    {
        $this->validate($request, [
            
            'file' => 'mimes:pdf,doc,xls|max:20000',
        ]);

        if ($pendahuluan->file && $request->file('file') != "") {
            $file_path = public_path() . '/upload/pendahuluan/' . $pendahuluan->file;
            unlink($file_path);
        }

        $pendahuluan->fill($request->all());

        if($request->file('file') != ""){
            $filename = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/pendahuluan'), $filename);
            $pendahuluan->file = $filename;
		}
        
        $pendahuluan->save();
        
        return redirect('/pendahuluan')->with('status', 'Data Berhasil Diubah');
    }

     ## Tampilkan Form Edit
     public function detail(Pendahuluan $pendahuluan)
     {
         $title = "Pendahuluan";
         $view=view('admin.pendahuluan.detail', compact('title','pendahuluan'));
         $view=$view->render();
         return $view;
     }
}
