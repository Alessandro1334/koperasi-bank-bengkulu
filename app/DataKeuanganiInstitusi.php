<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKeuanganiInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','aset_keuangan_tahun_1','aset_keuangan_tahun_2','aset_keuangan_tahun_3',
        'laba_keuangan_tahun_1','laba_keuangan_tahun_2','laba_keuangan_tahun_3','sumber_dana',
        'tujuan_investasi'
    ];
}
