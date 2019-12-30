<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SahamInstitusi extends Model
{
    protected $fillable=['institusi_id','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham','jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank','no_sk3s_lama','perubahan_ke','status_verifikasi'];

}
