<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investor;
use App\SahamInvestor;
use App\AgenPemasaran;
use Carbon;
use DB;

class LaporanController extends Controller
{
    public function laporanNasabah(){
        $nasabahs = Investor::leftJoin('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                            ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                            ->where('status_verifikasi','1')
                            ->get();
        $agens = AgenPemasaran::all();
        return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));
    }

    public function laporanNasabahFilter(Request $request){
        if(isset($_GET['metode'])){
            $agens = AgenPemasaran::all();
            if($_GET['metode']  ==  "semua"){
                $nasabahs = Investor::leftJoin('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                                    ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));
            }
            elseif($_GET['metode']  ==  "date"){
                $from = $_GET['date'];
                $mytime = Carbon\Carbon::now();
                $to = $_GET['date1'];
                $nasabahs = Investor::leftJoin('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                                    ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->whereBetween(DB::raw('DATE(investors.created_at)'), array($from, $to))
                                    ->where('status_verifikasi','1')
                                    ->get();
                                    // return $nasabahs;
                return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));

            }
            elseif($_GET['metode']   ==  "agen"){
                $nasabahs = Investor::leftJoin('pekerjaan_investors','pekerjaan_investors.investor_id','investors.id')
                                    ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->where('agen_pemasarans.id',$_GET['agen_id'])
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan.data_nasabah',compact('nasabahs','agens'));
            }
        }
    }

    public function laporanSahamNasabah(){
        $sahams = SahamInvestor::leftJoin('investors','investors.id','saham_investors.investor_id')
                            ->get();
        $agens = AgenPemasaran::all();
        return view('manajer/laporan.data_saham',compact('sahams','agens'));
    }

    public function laporanSahamNasabahFilter(Request $request){
        if(isset($_GET['metode'])){
            $agens = AgenPemasaran::all();
            if($_GET['metode']  ==  "semua"){
                $sahams = SahamInvestor::leftJoin('investors','investors.id','saham_investors.investor_id')
                                    ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan.data_saham',compact('sahams','agens'));
            }
            elseif($_GET['metode']  ==  "date"){
                $from = $_GET['date'];
                $mytime = Carbon\Carbon::now();
                $to = $_GET['date1'];
                $sahams = SahamInvestor::leftJoin('investors','investors.id','saham_investors.investor_id')
                                    ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->whereBetween(DB::raw('DATE(saham_investors.created_at)'), array($from, $to))
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan.data_saham',compact('sahams','agens'));

            }
            elseif($_GET['metode']   ==  "agen"){
                $sahams = SahamInvestor::leftJoin('investors','investors.id','saham_investors.investor_id')
                                    ->leftJoin('agen_pemasarans','agen_pemasarans.id','investors.staf_pemasaran_id')
                                    ->where('agen_pemasarans.id',$_GET['agen_id'])
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan.data_saham',compact('sahams','agens'));
            }
        }
    }
}


