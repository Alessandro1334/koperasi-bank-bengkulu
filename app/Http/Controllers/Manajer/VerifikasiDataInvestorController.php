<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
class VerifikasiDataInvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::select('nm_investor','kode_nasabah','no_cif','jenis_kelamin','no_ktp')->get();
        // return view('manajer/verifikasi_data_investor.index', compact('investors'));
        return $investors;
    }
}
