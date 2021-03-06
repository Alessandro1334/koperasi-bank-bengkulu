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
use App\Log;
use Auth;
use Gate;
use PDF;
use Illuminate\Support\Facades\Crypt;

class PembelianSahamInstitusiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }
        $sahams_acc = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->select('saham_institusis.id','institusi_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                    ->where('saham_institusis.status_verifikasi','!=','0')
                                    ->get();
        $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->select('saham_institusis.id','institusi_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
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
        $investor_pengalihans = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->select('saham_institusis.id','nm_investor','no_cif')
                                ->where('saham_institusis.status_verifikasi','1')->get();
        return view('operator/form_saham_institusi.create',compact('investors','investor_pengalihans'));
    }

    public function investorPengalih(Request $request){
        $id = $request->institusi_pengalihan_id;
        // return $id;
        $datas = SahamInstitusi::where('id',$id)
                                ->select('id','no_sk3s','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham',
                                        'jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank',
                                        'institusi_id_lama','no_sk3s_lama','created_at')
                                ->get();
                                // return $datas;
        $from = $datas[0]->created_at;
        $time = Carbon::now();
        $to = $time->toDateString();
        $total_days = $from->diffInDays($to);
        // return $total_days;
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

        $level = "operator";
        $aksi = "menambahkan saham investor nonperorangan";
        $halaman = "pembelian saham nonperorangan";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('operator.pembelian_saham_institusi')->with(['success'   =>  'Pembelian / Penglihan Saham Berhasil Dilakukan !!']);
    }

    public function sk3s($id){
        setlocale (LC_TIME, 'id_ID');
        $time_indo = Carbon::now()->formatLocalized("%A, %d %B %Y");
        $data = Crypt::decrypt($id);
        $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::where('status','1')->select('nm_ketua_koperasi')->first();
        $sk3s = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->where('saham_institusis.status_verifikasi','1')
                            ->where('saham_institusis.id',$data)
                            ->get();
        $pdf = PDF::loadView('operator/form_saham_institusi.sk3s',compact('barcode','ketua','sk3s','time_indo'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function detail(Request $request){
        $data = Crypt::decrypt($request->institusi_id);
        $rekening = RekeningInstitusi::find($data);
        $dokumen = DokumenPendukungInstitusi::where('institusi_id',$data)->first();
        $keuangan = DataKeuanganiInstitusi::where('institusi_id',$data)->first();
        $instruksi = InstruksiPembayaraniInstitusi::where('institusi_id',$data)->first();
        $saham = PemegangSahamInstitusi::where('institusi_id',$data)->first();
        $kuasa = PenerimaKuasaTransaksiInstitusi::where('institusi_id',$data)->first();
        $direksi = SusunanDireksiInstitusi::where('institusi_id',$data)->first();
        $komisaris = SusunanKomisarisInstitusi::where('institusi_id',$data)->first();
        $saham_institusi = SahamInstitusi::where('institusi_id',$data)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('rekening','dokumen','keuangan','instruksi','saham','kuasa','direksi','komisaris','agens','pejabats','saham_institusi');
    }

    public function spmpkop(Request $request){
        setlocale (LC_TIME, 'id_ID');
        $time_indo = Carbon::now()->formatLocalized("%d %B %Y");
        $data = Crypt::decrypt($request->saham_id);
        $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::where('status','1')->select('nm_ketua_koperasi')->first();
        $sk3s = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')->where('saham_institusis.status_verifikasi','1')
                ->where('saham_institusis.id',$data)
                ->get();
        $pdf = PDF::loadView('operator/form_saham_institusi.spmpkop',compact('barcode','ketua','sk3s','time_indo'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function cetak($id){
        $data = Crypt::decrypt($id);
        $investor = SahamInstitusi::leftJoin('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                            ->where('saham_institusis.id',$data)
                            ->first();
                            // return $investor;
        $pdf = PDF::loadView('operator/form_saham_institusi.cetak',compact('investor'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

}
