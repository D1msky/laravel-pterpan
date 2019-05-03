<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'id_skripsi';
    protected $fillable = ['judul','file','tgl_awal','tgl_akhir','status'];
}
