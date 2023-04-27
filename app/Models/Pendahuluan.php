<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendahuluan extends Model
{
    protected $table = 'pendahuluan_tbl';
	protected $fillable =[
        'file'
    ];
}
