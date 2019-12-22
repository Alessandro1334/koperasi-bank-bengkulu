<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetuaKoperasi extends Model
{
    protected $fillable = ['nm_ketua_koperasi','email','telephone','status'];
}
