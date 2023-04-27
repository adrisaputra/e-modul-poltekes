<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas_tbl';
	protected $fillable =[
        'kelas',
        'nama_dosen',
        'ruangan',
    ];
    
    public function mahasiswa(){
        return $this->hasOne('App\Models\Mahasiswa');
    }
}
