<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'id_skripsi';
    protected $fillable = ['judul','file','tgl_awal','tgl_akhir','status','id_pengajuan'];

    public function pengajuan()
    {
        return $this->belongsTo('\App\Pengajuan','id_pengajuan');
    }

    public function detail_skripsi()
    {
        return $this->hasMany('\App\Detail_Skripsi','id_skripsi');
    }
}
