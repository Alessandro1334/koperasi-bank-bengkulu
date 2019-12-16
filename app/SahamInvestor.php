<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SahamInvestor extends Model
{
    protected $fillable=['investor_id','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham','jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank','no_sk3s_lama','perubahan_k','status_verifikasi'];
}
