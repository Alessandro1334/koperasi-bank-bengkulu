<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekeningInstitusi;
use App\SahamInstitusi;
use App\AgenPemasaran;
use Carbon;
use DB;

class LaporanInstitusiController extends Controller
{
    public function laporanInstitusi(){
        $nasabahs = RekeningInstitusi::all();
        $agens = AgenPemasaran::all();
        return view('manajer/laporan_institusi.data_nasabah',compact('nasabahs','agens'));
    }

    public function laporanInstitusiFilter(Request $request){
        if(isset($_GET['metode'])){
            $agens = AgenPemasaran::all();
            if($_GET['metode']  ==  "semua"){
                $nasabahs = RekeningInstitusi::where('status_verifikasi','1')->get();
                return view('manajer/laporan_institusi.data_nasabah',compact('nasabahs','agens'));
            }
            elseif($_GET['metode']  ==  "date"){
                $from = $_GET['date'];
                $mytime = Carbon\Carbon::now();
                $to = $mytime->toDateString();
                $nasabahs = RekeningInstitusi::whereBetween(DB::raw('DATE(rekening_institusis.created_at)'), array($from, $to))
                                    ->get();
                                    // return $nasabahs;
                return view('manajer/laporan_institusi.data_nasabah',compact('nasabahs','agens'));

            }
            elseif($_GET['metode']   ==  "agen"){
                $nasabahs = RekeningInstitusi::join('pekerjaan_investors','pekerjaan_investors.investor_id','rekening_institusis.id')
                                    ->join('agen_pemasarans','agen_pemasarans.id','rekening_institusis.staf_pemasaran_id')
                                    ->where('status_verifikasi','1')
                                    ->where('agen_pemasarans.id',$_GET['agen_id'])
                                    ->get();
                return view('manajer/laporan_institusi.data_nasabah',compact('nasabahs','agens'));
            }
        }
    }

    public function laporanSahamInstitusi(){
        $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                            ->where('saham_institusis.status_verifikasi','1')
                            ->get();
        $agens = AgenPemasaran::all();
        return view('manajer/laporan_institusi.data_saham',compact('sahams','agens'));
    }

    public function laporanSahamInstitusiFilter(Request $request){
        if(isset($_GET['metode'])){
            $agens = AgenPemasaran::all();
            if($_GET['metode']  ==  "semua"){
                $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->where('status_verifikasi','1')
                                    ->join('agen_pemasarans','agen_pemasarans.id','rekening_institusis.staf_pemasaran_id')
                                    ->get();
                return view('manajer/laporan_institusi.data_saham',compact('sahams','agens'));
            }
            elseif($_GET['metode']  ==  "date"){
                $from = $_GET['date'];
                $mytime = Carbon\Carbon::now();
                $to = $mytime->toDateString();
                $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->join('agen_pemasarans','agen_pemasarans.id','rekening_institusis.staf_pemasaran_id')
                                    ->whereBetween(DB::raw('DATE(saham_institusis.created_at)'), array($from, $to))
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan_institusi.data_saham',compact('sahams','agens'));

            }
            elseif($_GET['metode']   ==  "agen"){
                $sahams = SahamInstitusi::join('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                                    ->join('agen_pemasarans','agen_pemasarans.id','rekening_institusis.staf_pemasaran_id')
                                    ->where('agen_pemasarans.id',$_GET['agen_id'])
                                    ->where('status_verifikasi','1')
                                    ->get();
                return view('manajer/laporan_institusi.data_saham',compact('sahams','agens'));
            }
        }
    }
}
