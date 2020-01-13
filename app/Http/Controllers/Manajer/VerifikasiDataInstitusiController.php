<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RekeningInstitusi;
use App\PejabatBerwenang;
use App\AgenPemasaran;
use App\SahamInstitusi;
use App\KetuaKoperasi;
use App\DokumenPendukungInvestor;
use App\DataPasanganOrangTuaInvestor;
use App\Persetujuan;
use App\PekerjaanInvestor;
use App\DokumenPendukungInstitusi;
use App\DataKeuanganiInstitusi;
use App\InstruksiPembayaraniInstitusi;
use App\SusunanKomisarisInstitusi;
use App\PemegangSahamInstitusi;
use App\PenerimaKuasaTransaksiInstitusi;
use App\SusunanDireksiInstitusi;
use App\Log;
use Auth;
use Gate;

class VerifikasiDataInstitusiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $investors_acc = RekeningInstitusi::select('id','nm_investor','no_register','nm_institusi','no_cif','tipe_perusahaan','karakteristik','bidang_usaha','status_verifikasi')
                            ->where('status_verifikasi','!=','0')
                            ->get();
        $investors = RekeningInstitusi::select('id','nm_investor','no_register','nm_institusi','tipe_perusahaan','karakteristik','bidang_usaha','status_verifikasi')
                            ->where('status_verifikasi','0')
                            ->get();
                            // return $investors;
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $agens = AgenPemasaran::where('status','1')->get();
        $investor_pengalihans = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->select('institusi_id','nm_investor')->where('saham_institusis.status_verifikasi','1')->get();
        return view('manajer/verifikasi_data_institusi.index', compact(['investors_acc','investors','pejabats','agens','investor_pengalihans']));
        // return $investors;
    }

    public function edit($id){
        $investor = RekeningInstitusi::where('id',$id)->select('id','nm_investor')->first();
        return $investor;
    }

    public function verifikasi(Request $request){
        // return $request->status_verifikasi;
        if($request->status_verifikasi == "1"){
            $last = RekeningInstitusi::max('no_cif');
            if($last == NULL || $last == ""){
                $investor = RekeningInstitusi::where('id',$request->institusi_id)->update([
                    'status_verifikasi' => $request->status_verifikasi,
                    'no_cif'    =>  '00000',
               ]);
            }

            else{
                $no_urut = substr($last,0,5);
                $no_urut++;
                $investor = RekeningInstitusi::where('id',$request->institusi_id)->update([
                    'status_verifikasi' => $request->status_verifikasi,
                    'no_cif'    => sprintf('%05s',$no_urut),
               ]);
            }

            $level = "manajer";
            $aksi = "menyetujui data investor nonperorangan";
            $halaman = "verifikasi data investor nonperorangan";
            $log = new Log;
            $log->user_id = Auth::user()->id;
            $log->level_user = $level;
            $log->aksi = $aksi;
            $log->halaman = $halaman;
            $log->save();
        }
        else{
            $investor = RekeningInstitusi::where('id',$request->institusi_id)->update([
                'status_verifikasi' => $request->status_verifikasi,
            ]);
            $investor = RekeningInstitusi::where('id',$request->institusi_id)->update([
                'status_verifikasi' => $request->status_verifikasi,
            ]);

            $level = "manajer";
            $aksi = "tidak menyetujui data investor nonperorangan";
            $halaman = "verifikasi data investor nonperorangan";
            $log = new Log;
            $log->user_id = Auth::user()->id;
            $log->level_user = $level;
            $log->aksi = $aksi;
            $log->halaman = $halaman;
            $log->save();
        }
        return redirect()->route('manajer.verifikasi_data_institusi')->with(['success'   =>  'Data Investor Berhasil Diverifikasi !!']);
    }

    public function detail($id){
        $rekening = RekeningInstitusi::find($id);
        $dokumen = DokumenPendukungInstitusi::where('institusi_id',$id)->first();
        $keuangan = DataKeuanganiInstitusi::where('institusi_id',$id)->first();
        $instruksi = InstruksiPembayaraniInstitusi::where('institusi_id',$id)->first();
        $saham = PemegangSahamInstitusi::where('institusi_id',$id)->first();
        $kuasa = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$id)->first();
        $direksi = SusunanDireksiInstitusi::where('institusi_id',$id)->first();
        $komisaris = SusunanKomisarisInstitusi::where('institusi_id',$id)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('rekening','dokumen','keuangan','instruksi','saham','kuasa','direksi','komisaris','agens','pejabats');
    }
}
