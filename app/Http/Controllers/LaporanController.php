<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investor;

class LaporanController extends Controller
{
    public function laporanNasabah(){
        return view('manajer/laporan.data_nasabah',compact('nasabahs'));
    }
}


