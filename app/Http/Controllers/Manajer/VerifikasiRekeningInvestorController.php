<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;

class VerifikasiRekeningInvestorController extends Controller
{
    public function index()
    {
        $sahams = SahamInvestor::select('investor_id','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham','jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank','no_sk3s_lama','perubahan_ke','status_verifikasi')->get();
        return view('manajer/verifikasi_pembukaan_rekening_investor_individual.index', compact('sahams'));
    }
}
