<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa_tbl';
	protected $fillable =[
        'kelas_id',
        'nim',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function kelas(){
        return $this->belongsTo('App\Models\Kelas');
    }
}
