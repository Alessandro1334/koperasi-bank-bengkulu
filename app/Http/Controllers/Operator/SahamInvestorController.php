<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;

class SahamInvestorController extends Controller
{
    public function index()
    {
        $saham = SahamInvestor::select('investor_id','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham','jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank','no_sk3s_lama','perubahan_k','status_verifikasi');
        return view('operator/form_saham.index', compact('saham'));
    }
}
