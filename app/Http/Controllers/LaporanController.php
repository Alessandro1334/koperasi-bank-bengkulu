<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investor;
use App\AgenPemasaran;
use Carbon;
use DB;

class LaporanController extends Controller
{
    public function laporanNasabah(){
        $nasabahs = Investor::join('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                            ->join('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                            ->get();
        $agens = AgenPemasaran::all();
        return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));
    }

    public function laporanNasabahFilter(Request $request){
        if(isset($_GET['metode'])){
            $agens = AgenPemasaran::all();
            if($_GET['metode']  ==  "semua"){
                $nasabahs = Investor::join('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                                    ->join('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->get();
                return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));
            }
            elseif($_GET['metode']  ==  "date"){
                $from = $_GET['date'];
                $mytime = Carbon\Carbon::now();
                $to = $mytime->toDateString();
                $nasabahs = Investor::join('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                                    ->join('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->whereBetween(DB::raw('DATE(investors.created_at)'), array($from, $to))
                                    ->get();
                                    // return $nasabahs;
                return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));

            }
            elseif($_GET['metode']   ==  "agen"){
                $nasabahs = Investor::join('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                                    ->join('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->where('agen_pemasarans.id',$_GET['agen_id'])
                                    ->get();
                return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));
            }
        }
    }
}


