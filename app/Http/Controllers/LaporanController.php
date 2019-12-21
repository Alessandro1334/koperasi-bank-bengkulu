<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investor;

class LaporanController extends Controller
{
    public function laporanNasabah(){
        $nasabah = Investor::select('nm_investor','kode_nasabah','no_cif','jenis_kelamin','no_ktp','status_verifikasi')->get();
        return $nasabah;
    }
}


