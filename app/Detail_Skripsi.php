<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Skripsi extends Model
{
    protected $table = 'detail_skripsi';
    protected $primaryKey = 'id_dtl';
    protected $fillable = ['catatan'];
}
