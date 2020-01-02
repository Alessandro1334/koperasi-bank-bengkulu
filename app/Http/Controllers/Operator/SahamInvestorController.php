<?php

namespace App\Http\Controllers\Operator;

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
use PDF;
use Gate;
use Carbon\Carbon;

class SahamInvestorController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }

        $sahams_acc = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','investor_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','1')
                                ->get();

        $sahams = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','investor_id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','0')
                                ->orWhere('saham_investors.status_verifikasi','1')
                                ->get();

        $investors = Investor::select('id','nm_investor')->get();
        $investor_pengalihans = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->select('investor_id','nm_investor')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $agens = AgenPemasaran::where('status','1')->get();
        return view('operator/form_saham.index', compact(['sahams_acc','sahams','investors','investor_pengalihans','pejabats','agens']));
    }

    public function tambahSaham()
    {
        $investors = Investor::select('id','nm_investor')->where('status_verifikasi','1')->get();
        $investor_pengalihans = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->select('investor_id','nm_investor')
                                ->where('saham_investors.status_verifikasi','1')->get();
        return view('operator/form_saham.create',compact('investors','investor_pengalihans'));
    }

    public function investorPengalih(Request $request){
        $investor_id = $request->investor_pengalihan_id;
        $datas = SahamInvestor::where('id',$investor_id)
                                ->select('investor_id','no_sk3s','seri_spmpkop','seri_formulir','jumlah_saham','terbilang_saham',
                                        'jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank',
                                        'investor_id_lama','no_sk3s_lama','created_at')
                                ->get();
        $from = $datas[0]->created_at;
        $time = Carbon::now();
        $to = $time->toDateString();
        $total_days = $from->diffInDays($time);
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

    public function sk3s($id){
        setlocale (LC_TIME, 'id_ID');
        $time_indo = Carbon::now()->formatLocalized("%A, %d %B %Y");
        $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::where('status','1')->select('nm_ketua_koperasi')->first();
        $sk3s = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('nm_investor','no_register','seri_spmpkop','seri_formulir','no_sk3s','jumlah_saham','terbilang_saham','perubahan_ke')
                                ->where('saham_investors.id',$id)
                                ->get();
        $pdf = PDF::loadView('operator/form_saham.sk3s',compact('barcode','ketua','sk3s','time_indo'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function spmpkop(Request $request){
        setlocale (LC_TIME, 'id_ID');
        $time_indo = Carbon::now()->formatLocalized("%d %B %Y");
        $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::where('status','1')->select('nm_ketua_koperasi')->first();
        $sk3s = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('nm_investor','no_register','seri_spmpkop','seri_formulir','no_sk3s','jumlah_saham','terbilang_saham')
                                ->where('saham_investors.id',$request->id_spmpkop)
                                ->get();
        $pdf = PDF::loadView('operator/form_saham.spmpkop',compact('barcode','ketua','sk3s','time_indo'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
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

    public function cetak($id){
        $investor = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                            ->where('saham_investors.id',$id)
                            ->first();
        $pdf = PDF::loadView('operator/form_saham.cetak',compact('investor'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
