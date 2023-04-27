<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;   //mahasiswa model
use App\Models\Kelas;   //mahasiswa model
use App\Models\JobSheet;   //mahasiswa model
use App\Models\User;   //mahasiswa model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index()
    {
        $title = "Mahasiswa";
        $mahasiswa = Mahasiswa::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.mahasiswa.index',compact('title','mahasiswa'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Mahasiswa";
        $mahasiswa = $request->get('search');
        $mahasiswa = Mahasiswa::
                        where(function ($query) use ($mahasiswa) {
                            $query->where('nama', 'LIKE', '%' . $mahasiswa . '%');
                        })
                        ->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.mahasiswa.index',compact('title','mahasiswa'));
    }
    
    ## Tampilkan Form Create
    public function create()
    {
        $title = "Mahasiswa";
        $kelas = Kelas::get();
        $view=view('admin.mahasiswa.create',compact('title','kelas'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->fill($request->all());
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->save();

        $user = new User();
		$user->name = $request->nim;
		$user->email = $request->nim.'@gmail.com';
		$user->password = Hash::make($request->nim);
		$user->group = 2;
        $user->save();
        
        return redirect('/mahasiswa')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Mahasiswa $mahasiswa)
    {
        $title = "Mahasiswa";
        $kelas = Kelas::get();
        $view=view('admin.mahasiswa.edit', compact('title','mahasiswa','kelas'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
        ]);

        $mahasiswa->fill($request->all());
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->save();
        
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Mahasiswa $mahasiswa)
    {
       $mahasiswa->delete();
       return redirect('/mahasiswa')->with('status', 'Data Berhasil Dihapus');
    }

    ## Tampikan Data
    public function lihat_mahasiswa(Kelas $kelas)
    {
        $title = "Mahasiswa";
        $mahasiswa = Mahasiswa::where('kelas_id',$kelas->id)->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.mahasiswa.lihat_mahasiswa',compact('title','mahasiswa','kelas'));
    }

    ## Tampikan Data
    public function lihat_mahasiswa_search(Request $request, Kelas $kelas)
    {
        $title = "Mahasiswa";
        $search = $request->get('search');
        $mahasiswa = Mahasiswa::where(function ($query) use ($search) {
                                    $query->where('nama', 'LIKE', '%' . $search . '%')
                                            ->orWhere('nim', 'LIKE', '%' . $search . '%');
                                })->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.mahasiswa.lihat_mahasiswa',compact('title','mahasiswa','kelas'));
    }

    ## Tampikan Data
    public function lihat_job_sheet(Mahasiswa $mahasiswa)
    {
        $title = "Job Sheet (".$mahasiswa->nama.")" ;
        $job_sheet = JobSheet::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.mahasiswa.lihat_job_sheet',compact('title','mahasiswa','job_sheet'));
    }

    ## Tampikan Data
    public function lihat_job_sheet_search(Request $request, Mahasiswa $mahasiswa)
    {
        $title = "Job Sheet (".$mahasiswa->nama.")" ;
        $search = $request->get('search');
        $job_sheet = JobSheet:: where(function ($query) use ($search) {
                                    $query->where('judul', 'LIKE', '%' . $search . '%');
                                })->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.mahasiswa.lihat_job_sheet',compact('title','mahasiswa','job_sheet'));
    }

}
