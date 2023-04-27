<?php

namespace App\Http\Controllers;

use App\Models\BacaJobSheet;   //nama model
use App\Models\Modul;   //nama model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BacaJobSheetController extends Controller
{
    ## Simpan Data
    public function store(Request $request, Modul $modul)
    {
        $baca_job_sheet = new BacaJobSheet();
        $baca_job_sheet->fill($request->all());
        $baca_job_sheet->modul_id = $modul->id;
        $baca_job_sheet->user_id = Auth::user()->id;
        $baca_job_sheet->save();

        return redirect('/modul/'.$modul->job_sheet->id)->with('status','Data Tersimpan');
    }

}
