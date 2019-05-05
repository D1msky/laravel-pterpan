<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'Pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = ['id_dosen','id_mhs','status','tgl_acc','tgl_selesai','judul'];

    public function dosen()
    {
        return $this->belongsTo('\App\Dosen','id_dosen');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('\App\Mahasiswa','id_mhs');
    }

    public function skripsi()
    {
        return $this->hasMany('\App\Skripsi','id_pengajuan');
    }
}
