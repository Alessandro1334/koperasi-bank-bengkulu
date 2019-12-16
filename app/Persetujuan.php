<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    protected $fillable = ['investor','nm_agen_pemasaran','tanda_tangan_agen_pemasaran','tanggal_agen_pemasaran','nm_pejabat_berwewenang','status_persetujuan','tanda_tangan_pejabat_berwewenang','tanggal_pejabat_berwewenang'];
}
