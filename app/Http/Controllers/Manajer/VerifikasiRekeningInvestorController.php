<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;
use Gate;

class VerifikasiRekeningInvestorController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $sahams_acc = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','1')
                                ->get();
        $sahams = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','1')
                                ->orWhere('saham_investors.status_verifikasi','0','2')
                                ->get();


        return view('manajer/verifikasi_pembukaan_rekening_investor_individual.index', compact(['sahams_acc','sahams']));
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
