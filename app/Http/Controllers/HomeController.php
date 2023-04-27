<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use App\Models\Mahasiswa;   //nama model
use App\Models\JobSheet;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        $mahasiswa = Mahasiswa::count();
        $job_sheet = JobSheet::count();
        $user = User::count();
        return view('admin.beranda', compact('mahasiswa','job_sheet','user'));
    }
}
