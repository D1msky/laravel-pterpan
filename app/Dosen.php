<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "Dosen";
    protected $primaryKey = "id_dosen";
    protected $fillable = ['user_id','email','nama','password','status'];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class,'id_dosen');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
