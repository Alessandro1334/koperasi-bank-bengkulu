<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RekeningInstitusi;
use App\SahamInstitusi;
use Carbon\Carbon;
use Gate;

class PembelianSahamInstitusiController extends Controller
{
    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }
        $sahams_acc = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->select('saham_institusis.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                    ->where('saham_institusis.status_verifikasi','!=','0')
                                    ->get();

        $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->select('saham_institusis.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                    ->where('saham_institusis.status_verifikasi','0')
                                    ->get();
        return view('operator/form_saham_institusi.index',compact('sahams_acc','sahams'));
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

}
