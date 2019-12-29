<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInvestor;
use App\Investor;
use App\Barcodes;
use App\KetuaKoperasi;
use PDF;
use Gate;

class SahamInvestorController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }

        $sahams_acc = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','1')
                                ->get();

        $sahams = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('saham_investors.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_investors.status_verifikasi')
                                ->where('saham_investors.status_verifikasi','0')
                                ->orWhere('saham_investors.status_verifikasi','1')
                                ->get();        
                               
        $investors = Investor::select('id','nm_investor')->get();
        $investor_pengalihans = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->select('investor_id','nm_investor')->get();
        return view('operator/form_saham.index', compact(['sahams_acc','sahams','investors','investor_pengalihans']));
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

    public function sk3s($id){
        $barcode = Barcodes::where('status','aktif')->select('nm_file')->first();
        $ketua = KetuaKoperasi::where('status','1')->select('nm_ketua_koperasi')->first();
        $sk3s = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')
                                ->select('nm_investor','no_register','seri_spmpkop','seri_formulir','no_sk3s','jumlah_saham','terbilang_saham')
                                ->get();
        $pdf = PDF::loadView('operator/form_saham.sk3s',compact('barcode','ketua','sk3s'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

    public function detail($id){
        $sahams = SahamInvestor::find($id);
        return compact('sahams');
    }
}
