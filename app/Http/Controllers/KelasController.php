<?php

namespace App\Http\Controllers;

use App\Models\Kelas;   //kelas model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index()
    {
        $title = "Kelas";
        $kelas = Kelas::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.kelas.index',compact('title','kelas'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Kelas";
        $kelas = $request->get('search');
        $kelas = Kelas::
                        where(function ($query) use ($kelas) {
                            $query->where('kelas', 'LIKE', '%' . $kelas . '%');
                        })
                        ->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.kelas.index',compact('title','kelas'));
    }
    
    ## Tampilkan Form Create
    public function create()
    {
        $title = "Kelas";
        $view=view('admin.kelas.create',compact('title'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas' => 'required',
        ]);

        $kelas = new Kelas();
        $kelas->fill($request->all());
        $kelas->save();

        return redirect('/kelas')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Kelas $kelas)
    {
        $title = "Kelas";
        $view=view('admin.kelas.edit', compact('title','kelas'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Kelas $kelas)
    {
        $this->validate($request, [
            'kelas' => 'required'
        ]);

        $kelas->fill($request->all());
        $kelas->save();
        
        return redirect('/kelas')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Kelas $kelas)
    {
       $kelas->delete();
       return redirect('/kelas')->with('status', 'Data Berhasil Dihapus');
    }
}
