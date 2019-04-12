<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'Mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $fillable = ['user_id','nim','email','password'];
}
