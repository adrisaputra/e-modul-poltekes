<?php

namespace App\Http\Controllers;

use App\Models\PostTest;   //nama model
use Maatwebsite\Excel\Facades\Excel; // Excel Library
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Image;
use PDF;

class PostTestController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ## Tampikan Data
    public function index()
    {
        $title = "Post Test";
        $post_test = PostTest::orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.post_test.index',compact('title','post_test'));
    }

    ## Tampilkan Data Search
    public function search(Request $request)
    {
        $title = "Post Test";
        $post_test = $request->get('search');
        $post_test = PostTest::
                        where(function ($query) use ($post_test) {
                            $query->where('judul', 'LIKE', '%' . $post_test . '%');
                        })
                        ->orderBy('id','ASC')->paginate(25)->onEachSide(1);
        return view('admin.post_test.index',compact('title','post_test'));
    }
    
    ## Tampilkan Form Create
    public function create()
    {
        $title = "Post Test";
        $view=view('admin.post_test.create',compact('title'));
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

        $post_test = new PostTest();
        $post_test->fill($request->all());
        $post_test->save();

        return redirect('/post_test')->with('status','Data Tersimpan');
    }

    ## Tampilkan Form Edit
    public function edit(PostTest $post_test)
    {
        $title = "Post Test";
        $view=view('admin.post_test.edit', compact('title','post_test'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, PostTest $post_test)
    {
        $this->validate($request, [
            'judul' => 'required',
            'url' => 'required',
        ]);

        $post_test->fill($request->all());
        $post_test->save();
        
        return redirect('/post_test')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(PostTest $post_test)
    {
       $post_test->delete();
       return redirect('/post_test')->with('status', 'Data Berhasil Dihapus');
    }
}
