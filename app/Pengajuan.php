<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'Pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = ['id_skripsi','id_dosen','id_mhs','status','tgl_acc','tgl_selesai'];

    public function dosen()
    {
        return $this->belongsTo('\App\Dosen','id_dosen');
    }
}
