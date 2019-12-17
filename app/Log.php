<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id','level_user','aksi','halaman','atribut_data','data_lama','data_baru'
    ];
}
