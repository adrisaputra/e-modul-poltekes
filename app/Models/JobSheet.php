<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSheet extends Model
{
    protected $table = 'job_sheet_tbl';
	protected $fillable =[
        'judul'
    ];
    
    public function modul(){
        return $this->hasMany('App\Models\Modul');
    }
    
    public function baca_job_sheet(){
        return $this->hasMany('App\Models\BacaJobSheet');
    }
}
