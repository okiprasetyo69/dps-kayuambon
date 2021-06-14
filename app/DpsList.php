<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DpsList extends Model
{
    protected $fillable = [
        'nkk', 'nik', 'nama' ,'tempat_lahir', 'tgl_lahir', 'kawin', 'jenis_kelamin', 'alamat', 'rt', 'rw', 'difabel', 'keterangan', 'sumberdata', 'tps'
    ];
}
