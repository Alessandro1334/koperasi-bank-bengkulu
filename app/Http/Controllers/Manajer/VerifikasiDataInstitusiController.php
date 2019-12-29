<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RekeningInstitusi;
use Gate;

class VerifikasiDataInstitusiController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $investors_acc = RekeningInstitusi::select('id','nm_investor','no_register','nm_institusi','tipe_perusahaan','karakteristik','bidang_usaha','status_verifikasi')
                            ->where('status_verifikasi','!=','0')
                            ->get();
        $investors = RekeningInstitusi::select('id','nm_investor','no_register','nm_institusi','tipe_perusahaan','karakteristik','bidang_usaha','status_verifikasi')
                            ->where('status_verifikasi','0')
                            ->get();
        return view('manajer/verifikasi_data_institusi.index', compact(['investors_acc','investors']));
        // return $investors;
    }

    public function edit($id){
        $investor = RekeningInstitusi::where('id',$id)->select('id','nm_investor')->first();
        return $investor;
    }

    public function verifikasi(Request $request){
        $investor = RekeningInstitusi::where('id',$request->institusi_id)->update([
            'status_verifikasi' => $request->status_verifikasi
        ]);
        return redirect()->route('manajer.verifikasi_data_institusi')->with(['success'   =>  'Data Investor Berhasil Diverifikasi !!']);
    }
}
