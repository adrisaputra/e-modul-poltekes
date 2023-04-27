<?php

namespace App\Http\Controllers;

use App\Models\JobSheet;   //nama model
use App\Models\Modul;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ModulController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index(JobSheet $job_sheet)
    {
        $title = "Modul";
        $modul = Modul::where('job_sheet_id',$job_sheet->id)->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.modul.index',compact('title','job_sheet','modul'));
    }

    ## Tampilkan Data Search
    public function search(Request $request, JobSheet $job_sheet)
    {
        $title = "Modul";
        $modul = $request->get('search');
        $modul = Modul::
                        where(function ($query) use ($modul) {
                            $query->where('judul', 'LIKE', '%' . $modul . '%');
                        })
                        ->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.modul.index',compact('title','job_sheet','modul'));
    }
    
    ## Tampilkan Form Create
    public function create(JobSheet $job_sheet)
    {
        $title = "Modul";
        $view=view('admin.modul.create',compact('title','job_sheet'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request, JobSheet $job_sheet)
    {
        $this->validate($request, [
            'judul' => 'required',
            'file' => 'mimes:pdf,doc,xls|max:20000',
            'gambar' => 'mimes:jpg,jpeg,png|max:20000',
        ]);

        $modul = new Modul();
        $modul->fill($request->all());
        $modul->job_sheet_id = $job_sheet->id;
        
		if($request->file('file')){
			$modul->file = time().'.'.$request->file->getClientOriginalExtension();
			$request->file->move(public_path('upload/modul'), $modul->file);
    	}	
		
		if($request->file('gambar')){
			$modul->gambar = time().'.'.$request->gambar->getClientOriginalExtension();
			$request->gambar->move(public_path('upload/modul'), $modul->gambar);
    	}	
		
        $modul->save();

        return redirect('/modul/'.$job_sheet->id)->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(JobSheet $job_sheet, Modul $modul)
    {
        $title = "Modul";
        $view=view('admin.modul.edit', compact('title','job_sheet','modul'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, JobSheet $job_sheet, Modul $modul)
    {
        $this->validate($request, [
            'judul' => 'required',
            'file' => 'mimes:pdf,doc,xls|max:20000',
            'gambar' => 'mimes:jpg,jpeg,png|max:20000',
        ]);

        if ($modul->file && $request->file('file') != "") {
            $file_path = public_path() . '/upload/modul/' . $modul->file;
            unlink($file_path);
        }

        if ($modul->gambar && $request->file('gambar') != "") {
            $file_path = public_path() . '/upload/modul/' . $modul->gambar;
            unlink($file_path);
        }

        $modul->fill($request->all());
        $modul->job_sheet_id = $job_sheet->id;
        
		if($request->file('file') != ""){
            $filename = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/modul'), $filename);
            $modul->file = $filename;
		}
        
		if($request->file('gambar') != ""){
            $filename = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('upload/modul'), $filename);
            $modul->gambar = $filename;
		}
        
        $modul->save();
        
        return redirect('/modul/'.$job_sheet->id)->with('status', 'Data Berhasil Diubah');
    }

    ## Tampilkan Form Edit
    public function detail(JobSheet $job_sheet, Modul $modul)
    {
        $title = "Modul";
        $view=view('admin.modul.detail', compact('title','job_sheet','modul'));
        $view=$view->render();
        return $view;
    }

    ## Hapus Data
    public function delete(JobSheet $job_sheet, Modul $modul)
    {
        
        if ($modul->file) {
            $file_path = public_path() . '/upload/modul/' . $modul->file;
            unlink($file_path);
        }

       $modul->delete();
       return redirect('/modul/'.$job_sheet->id)->with('status', 'Data Berhasil Dihapus');
    }

}
