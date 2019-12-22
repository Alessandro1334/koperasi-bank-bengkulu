<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcodes extends Model
{
    protected $fillable = ['id','nm_file','keterangan','status'];
}
