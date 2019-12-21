<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
class VerifikasiDataInvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::select('id','nm_investor','kode_nasabah','no_cif','jenis_kelamin','no_ktp','status_verifikasi')->get();
        return view('manajer/verifikasi_data_investor.index', compact('investors'));
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
