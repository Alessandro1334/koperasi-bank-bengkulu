<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemegangSahamInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','no_pemegang_saham','komposisi_pemegang_saham','tanggal_pernyataan',
        'yang_menyatakan'
    ];
}
