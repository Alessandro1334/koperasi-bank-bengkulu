<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaKuasaTransaksiInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','nm_kuasa','no_identitas','tgl_kadaluarsa_identitas','jabatan','telephone'
    ];
}
