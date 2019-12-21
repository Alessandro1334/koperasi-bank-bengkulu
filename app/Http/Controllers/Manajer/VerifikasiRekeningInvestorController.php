<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;

class VerifikasiRekeningInvestorController extends Controller
{
    public function index()
    {
        $sahams = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama',
                                        'saham_investors.status_verifikasi')
                                ->get();
        return view('manajer/verifikasi_pembukaan_rekening_investor_individual.index', compact('sahams'));
    }

    public function edit($id){
        $sahan = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->where('saham_investors.id',$id)->select('saham_investors.id','nm_investor')->first();
        return $sahan;
    }

    public function verifikasi(Request $request){
        $saham = SahamInvestor::where('id',$request->saham_id)->update([
            'status_verifikasi' => $request->status_verifikasi
        ]);
        return redirect()->route('manajer.verifikasi_rekening_investor')->with(['success'   =>  'Data Saham Investor Berhasil Diverifikasi !!']);
    }
}
