<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstruksiPembayaraniInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','nm_pemilik_bank','nm_bank','no_rek'
    ];
}
