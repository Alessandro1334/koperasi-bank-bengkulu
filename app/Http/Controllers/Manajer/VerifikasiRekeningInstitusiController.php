<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInstitusi;
use App\RekeningInstitusi;
use App\SahamInvestor;
use App\DokumenPendukungInstitusi;
use App\DataKeuanganiInstitusi;
use App\InstruksiPembayaraniInstitusi;
use App\PemegangSahamInstitusi;
use App\PenerimaKuasaTransaksiInstitusi;
use App\SusunanDireksiInstitusi;
use App\SusunanKomisarisInstitusi;
use App\AgenPemasaran;
use App\PejabatBerwenang;
use App\investor_pengalihans;
use Gate;

class VerifikasiRekeningInstitusiController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $sahams_acc = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                ->select('saham_institusis.id','institusi_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                ->where('saham_institusis.status_verifikasi','1')
                                ->get();
        $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                ->select('saham_institusis.id','institusi_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                ->where('saham_institusis.status_verifikasi','!=','1')
                                ->get();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $investors = RekeningInstitusi::select('id','nm_investor','nm_institusi','karakteristik','bidang_usaha','tipe_perusahaan','status_verifikasi')->where('status_verifikasi','0')->get();
        $investor_pengalihans = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->select('institusi_id','nm_investor')->where('saham_institusis.status_verifikasi','1')->get();
        return view('manajer/verifikasi_rekening_institusi.index', compact(['sahams_acc','sahams','agens','pejabats','investor_pengalihans','investors']));
    }

    public function edit($id){
        $sahan = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->where('saham_institusis.id',$id)->select('saham_institusis.id','nm_investor')->first();
        return $sahan;
    }

    public function verifikasi(Request $request){
        $saham = SahamInstitusi::where('id',$request->saham_institusi_id)->update([
            'status_verifikasi' => $request->status_verifikasi
        ]);
        return redirect()->route('manajer.verifikasi_rekening_institusi')->with(['success'   =>  'Data Saham Institusi Berhasil Diverifikasi !!']);
    }

    public function detail(Request $request){
        $rekening = RekeningInstitusi::find($request->institusi_id);
        $dokumen = DokumenPendukungInstitusi::where('institusi_id',$request->institusi_id)->first();
        $keuangan = DataKeuanganiInstitusi::where('institusi_id',$request->institusi_id)->first();
        $instruksi = InstruksiPembayaraniInstitusi::where('institusi_id',$request->institusi_id)->first();
        $saham = PemegangSahamInstitusi::where('institusi_id',$request->institusi_id)->first();
        $kuasa = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$request->institusi_id)->first();
        $direksi = SusunanDireksiInstitusi::where('institusi_id',$request->institusi_id)->first();
        $komisaris = SusunanKomisarisInstitusi::where('institusi_id',$request->institusi_id)->first();
        $saham_institusi = SahamInstitusi::where('institusi_id',$request->institusi_id)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('rekening','dokumen','keuangan','instruksi','saham','kuasa','direksi','komisaris','agens','pejabats','saham_institusi');
    }
}
