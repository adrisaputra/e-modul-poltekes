<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTest extends Model
{
    protected $table = 'post_test_tbl';
    protected $fillable = [
        'judul',
        'url',
    ];
}
