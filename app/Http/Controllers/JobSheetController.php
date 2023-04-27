<?php

namespace App\Http\Controllers;

use App\Models\JobSheet;   //judul model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JobSheetController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index()
    {
        $title = "Job Sheet";
        $job_sheet = JobSheet::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.job_sheet.index',compact('title','job_sheet'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Job Sheet";
        $job_sheet = $request->get('search');
        $job_sheet = JobSheet::
                        where(function ($query) use ($job_sheet) {
                            $query->where('judul', 'LIKE', '%' . $job_sheet . '%');
                        })
                        ->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.job_sheet.index',compact('title','job_sheet'));
    }
    
    ## Tampilkan Form Create
    public function create()
    {
        $title = "Job Sheet";
        $view=view('admin.job_sheet.create',compact('title'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
        ]);

        $job_sheet = new JobSheet();
        $job_sheet->fill($request->all());
        $job_sheet->save();

        return redirect('/job_sheet')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(JobSheet $job_sheet)
    {
        $title = "Job Sheet";
        $view=view('admin.job_sheet.edit', compact('title','job_sheet'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, JobSheet $job_sheet)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);

        $job_sheet->fill($request->all());
        $job_sheet->save();
        
        return redirect('/job_sheet')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(JobSheet $job_sheet)
    {
       $job_sheet->delete();
       return redirect('/job_sheet')->with('status', 'Data Berhasil Dihapus');
    }

}
