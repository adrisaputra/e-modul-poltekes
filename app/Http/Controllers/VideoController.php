<?php

namespace App\Http\Controllers;

use App\Models\Video;   //nama model
use Maatwebsite\Excel\Facades\Excel; // Excel Library
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Image;
use PDF;

class VideoController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index()
    {
        $title = "Video";
        $video = Video::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.video.index',compact('title','video'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Video";
        $video = $request->get('search');
        $video = Video::
                        where(function ($query) use ($video) {
                            $query->where('judul', 'LIKE', '%' . $video . '%');
                        })
                        ->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.video.index',compact('title','video'));
    }
    
    ## Tampilkan Form Create
    public function create()
    {
        $title = "Video";
        $view=view('admin.video.create',compact('title'));
        $view=$view->render();
        return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'url' => 'required',
        ]);

        $video = new Video();
        $video->fill($request->all());
        $video->save();

        return redirect('/video')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(Video $video)
    {
        $title = "Video";
        $view=view('admin.video.edit', compact('title','video'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Video $video)
    {
        $this->validate($request, [
            'judul' => 'required',
            'url' => 'required',
        ]);

        $video->fill($request->all());
        $video->save();
        
        return redirect('/video')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Video $video)
    {
       $video->delete();
       return redirect('/video')->with('status', 'Data Berhasil Dihapus');
    }
}
