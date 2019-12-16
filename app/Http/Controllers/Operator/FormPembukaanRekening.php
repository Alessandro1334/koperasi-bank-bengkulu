<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;

class FormPembukaanRekening extends Controller
{
    public function index(){
        $investors = Investor::select('nm_investor','kode_nasabah','no_cif','jenis_kelamin','no_ktp')->get();
        // return $investors;
        return view('operator/form_pembukaan_rekening.index',compact('investors'));
    }

    public function tambahInvestor(){
        return view('operator/form_pembukaan_rekening.create');
    }

    public function tambahInvestorPost(Request $request){
        $model = $request->all();
        return $model;
    }
}
