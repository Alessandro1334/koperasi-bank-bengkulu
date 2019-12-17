<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;
use App\Investor;

class SahamInvestorController extends Controller
{
    public function index()
    {
        $sahams = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','status_verifikasi')
                                ->get();
        return view('operator/form_saham.index', compact('sahams'));
    }

    public function tambahSaham()
    {
        $investors = Investor::all();
        return view('operator/form_saham.create');
    }

    public function tambahSahamPost()
    {

    }
}
