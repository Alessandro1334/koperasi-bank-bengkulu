<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;
use App\Investor;
use App\Barcodes;
use App\KetuaKoperasi;
use App\PejabatBerwenang;
use App\DokumenPendukungInvestor;
use App\DataPasanganOrangTuaInvestor;
use App\Persetujuan;
use App\PekerjaanInvestor;
use App\AgenPemasaran;
use Gate;

class VerifikasiRekeningInvestorController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $sahams_acc = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','investor_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','!=','0')
                                ->get();
        $sahams = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','investor_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','0')
                                ->get();
        $investors = Investor::select('id','nm_investor')->get();
        $investor_pengalihans = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->select('investor_id','nm_investor')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $agens = AgenPemasaran::where('status','1')->get();
        return view('manajer/verifikasi_pembukaan_rekening_investor_individual.index', compact(['sahams_acc','sahams','pejabats','agens','investor_pengalihans','investors']));
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

    public function detail(Request $request){
        $sahams = SahamInvestor::find($request->id_saham);
        $investor = Investor::find($request->id_investor);
        $dokumen = DokumenPendukungInvestor::where('investor_id',$request->id_investor)->first();
        $pasangan = DataPasanganOrangTuaInvestor::where('investor_id',$request->id_investor)->first();
        $persetujuan = Persetujuan::where('investor_id',$request->id_investor)->first();
        $pekerjaan = PekerjaanInvestor::where('investor_id',$request->id_investor)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('sahams','investor','dokumen','pasangan','persetujuan','pekerjaan','agens','pejabats');
    }
}
