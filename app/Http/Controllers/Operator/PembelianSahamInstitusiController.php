<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RekeningInstitusi;
use App\SahamInstitusi;
use App\Barcodes;
use App\KetuaKoperasi;
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
use Carbon\Carbon;
use Gate;
use PDF;

class PembelianSahamInstitusiController extends Controller
{
    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }
        $sahams_acc = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->select('saham_institusis.id','institusi_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                    ->where('saham_institusis.status_verifikasi','!=','0')
                                    ->get();
        $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->select('saham_institusis.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                    ->where('saham_institusis.status_verifikasi','0')
                                    ->get();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $investors = RekeningInstitusi::select('id','nm_investor','nm_institusi','karakteristik','bidang_usaha','tipe_perusahaan','status_verifikasi')->where('status_verifikasi','0')->get();
        $investor_pengalihans = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->select('institusi_id','nm_investor')->where('saham_institusis.status_verifikasi','1')->get();
        return view('operator/form_saham_institusi.index',compact('sahams_acc','sahams','agens','pejabats','investor_pengalihans','investors'));
    }

    public function tambahSaham()
    {
        $investors = RekeningInstitusi::select('id','nm_investor')->where('status_verifikasi','1')->get();
        $investor_pengalihans = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->select('institusi_id','nm_investor')->where('saham_institusis.status_verifikasi','1')->get();
        return view('operator/form_saham_institusi.create',compact('investors','investor_pengalihans'));
    }

    public function investorPengalih(Request $request){
        $institusi_id = $request->institusi_pengalihan_id;
        $datas = SahamInstitusi::where('institusi_id',$institusi_id)
                                ->select('id','no_sk3s','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham',
                                        'jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank',
                                        'institusi_id_lama','no_sk3s_lama','created_at')
                                ->get();
        $from = $datas[0]->created_at;
        $time = Carbon::now();
        $to = $time->toDateString();
        $total_days = $from->diffInDays($time);
        return $no_cif;
        if($total_days >= 360){
            $message = [
                'status'    =>  "1",
                'datas'     =>  $datas,
            ];
            return response()->json($message);
        }
        else{
            $message = [
                'status'    =>  "0",
            ];
            return response()->json($message);
        }
    }

    public function tambahSahamPost(Request $request)
    {
        $saham = new SahamInstitusi;
        $saham->no_sk3s = $request->no_sk3s;
        $saham->institusi_id = $request->institusi_id;
        $saham->seri_spmpkop = $request->seri_spmpkop;
        $saham->seri_formulir = $request->seri_formulir;
        $saham->jumlah_saham = $request->jumlah_saham;
        $saham->terbilang_saham = $request->terbilang_saham;
        $saham->jenis_mata_uang = $request->jenis_mata_uang;
        $saham->pembayaran_no_rek = $request->pembayaran_no_rek;
        $saham->pembayaran_nm_rek = $request->pembayaran_nm_rek;
        $saham->pembayaran_nm_bank = $request->pembayaran_nm_bank;
        $saham->no_sk3s_lama = $request->no_sk3s_lama;
        $saham->institusi_id_lama = $request->institusi_id_lama;
        $saham->save();

        return redirect()->route('operator.pembelian_saham_institusi')->with(['success'   =>  'Pembelian / Penglihan Saham Berhasil Dilakukan !!']);
    }

    public function sk3s($id){
        setlocale (LC_TIME, 'id_ID');
        $time_indo = Carbon::now()->formatLocalized("%A, %d %B %Y");
        $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::where('status','1')->select('nm_ketua_koperasi')->first();
        $sk3s = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('nm_investor','no_register','seri_spmpkop','seri_formulir','no_sk3s','jumlah_saham','terbilang_saham','perubahan_ke')
                                ->get();
        $pdf = PDF::loadView('operator/form_saham.sk3s',compact('barcode','ketua','sk3s','time_indo'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
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
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('rekening','dokumen','keuangan','instruksi','saham','kuasa','direksi','komisaris','agens','pejabats');
    }

    public function cetak($id){
        $investor = SahamInstitusi::leftJoin('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                            ->where('saham_institusis.id',$id)
                            ->first();
                            // return $investor;
        $pdf = PDF::loadView('operator/form_saham_institusi.cetak',compact('investor'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

}
