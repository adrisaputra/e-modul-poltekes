<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul_tbl';
	protected $fillable =[
        'job_sheet_id',
        'judul',
        'file',
        'gambar',
    ];

    public function job_sheet(){
        return $this->belongsTo('App\Models\JobSheet');
    }

}
