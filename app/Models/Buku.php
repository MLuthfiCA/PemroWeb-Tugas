<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku'; // sesuaikan dengan nama tabel kamu

    protected $fillable = [
        'judul',
        'penulis',
        'genre',
        'status'
    ];
}
