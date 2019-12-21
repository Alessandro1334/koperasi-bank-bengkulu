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
                                ->select('nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->get();
        return view('operator/form_saham.index', compact('sahams'));
    }

    public function tambahSaham()
    {
        $investors = Investor::select('id','nm_investor')->get();
        $investor_pengalihans = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->select('investor_id','nm_investor')->get();
        return view('operator/form_saham.create',compact('investors','investor_pengalihans'));
    }

    public function investorPengalih(Request $request){
        $investor_id = $request->investor_pengalihan_id;
        $datas = SahamInvestor::where('investor_id',$investor_id)
                                ->select('investor_id','no_sk3s','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham',
                                        'jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank',
                                        'investor_id_lama','no_sk3s_lama')
                                ->get();
                                // return $datas;
        return response()->json($datas);
    }

    public function tambahSahamPost(Request $request)
    {
        $saham = new SahamInvestor;
        $saham->no_sk3s = $request->no_sk3s;
        $saham->investor_id = $request->investor_id;
        $saham->seri_spmpkop = $request->seri_spmpkop;
        $saham->seri_formulir = $request->seri_formulir;
        $saham->jumlah_saham = $request->jumlah_saham;
        $saham->terbilang_saham = $request->terbilang_saham;
        $saham->jenis_mata_uang = $request->jenis_mata_uang;
        $saham->pembayaran_no_rek = $request->pembayaran_no_rek;
        $saham->pembayaran_nm_rek = $request->pembayaran_nm_rek;
        $saham->pembayaran_nm_bank = $request->pembayaran_nm_bank;
        $saham->no_sk3s_lama = $request->no_sk3s_lama;
        $saham->investor_id_lama = $request->investor_id_lama;
        $saham->save();

        return redirect()->route('operator.manajemen_saham')->with(['success'   =>  'Pembelian / Penglihan Saham Berhasil Dilakukan !!']);
    }
}
