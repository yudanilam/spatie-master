<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_aplikasi',
        'judul',
        'footer',
        'version'
    ];
}
