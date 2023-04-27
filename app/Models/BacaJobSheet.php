<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacaJobSheet extends Model
{
    protected $table = 'baca_job_sheet_tbl';
	protected $fillable =[
        'modul_id',
        'user_id',
        'status'
    ];
    
    public function modul(){
        return $this->belongsTo('App\Models\Modul');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
