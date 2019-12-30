<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInstitusi;
use Gate;

class VerifikasiRekeningInstitusiController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $sahams_acc = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                ->select('saham_institusis.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                ->where('saham_institusis.status_verifikasi','1')
                                ->get();
        $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                ->select('saham_institusis.id','nm_investor','jumlah_saham','terbilang_saham','no_sk3s_lama','saham_institusis.status_verifikasi')
                                ->where('saham_institusis.status_verifikasi','!=','1')
                                ->get();


        return view('manajer/verifikasi_rekening_institusi.index', compact(['sahams_acc','sahams']));
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
}
