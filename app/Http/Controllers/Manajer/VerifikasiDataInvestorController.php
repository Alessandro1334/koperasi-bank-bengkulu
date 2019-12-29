<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use Gate;

class VerifikasiDataInvestorController extends Controller
{
    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $investors_acc = Investor::select('id','nm_investor','jenis_rekening','no_cif','jenis_kelamin','no_ktp','status_verifikasi')
                            ->where('status_verifikasi','1')     
                            ->get();
        $investors = Investor::select('id','nm_investor','jenis_rekening','no_cif','jenis_kelamin','no_ktp','status_verifikasi')
                            ->where('status_verifikasi','0')
                            ->orWhere('status_verifikasi','2') 
                            ->get();
        return view('manajer/verifikasi_data_investor.index', compact(['investors_acc','investors']));
        // return $investors;
    }

    public function edit($id){
        $investor = Investor::where('id',$id)->select('id','nm_investor')->first();
        return $investor;
    }

    public function verifikasi(Request $request){
        $investor = Investor::where('id',$request->investor_id)->update([
            'status_verifikasi' => $request->status_verifikasi
        ]);
        return redirect()->route('manajer.verifikasi_data_investor')->with(['success'   =>  'Data Investor Berhasil Diverifikasi !!']);
    }
}
