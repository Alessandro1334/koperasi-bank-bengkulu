<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SahamInstitusi;
use App\SahamInvestor;
use DB;
use Excel;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function laporanPerorangan(){
        return view('manajer/laporan_saham.perorangan');
    }

    public function laporanPeroranganImport(Request $request){
        if(isset($request->date1) && isset($request->date2)){
            $from = $request->date1;
            $to = $request->date2;
            $data_saham_perorangan = SahamInvestor::leftJoin('investors','investors.id','saham_investors.investor_id')
                            ->select('nm_investor','no_register','no_cif','jenis_kelamin','no_sk3s','seri_spmpkop','seri_formulir','jumlah_saham',
                                    'terbilang_saham','jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank','investor_id_lama',
                                    'saham_investors.status_verifikasi')
                            ->whereBetween(DB::raw('DATE(saham_investors.created_at)'), array($from, $to))
                            ->get();
            return Excel::create('data_saham_perorangan', function($excel) use ($data_saham_perorangan){
                $excel->sheet('data_investr', function($sheet) use ($data_saham_perorangan){
                    $sheet->fromArray($data_saham_perorangan);
                });
            })->download('xls');
            return redirect('manajer.laporan_perorangan')->with(['success'    =>  'Laporan sudah dicetak dalam bentuk microsoft excel !!']);
        }
    }

    public function laporanNonPerorangan(){
        return view('manajer/laporan_saham.non_perorangan');
    }

    public function laporanNonPeroranganImport(Request $request){
        if(isset($request->date1) && isset($request->date2)){
            $from = $request->date1;
            $to = $request->date2;
            $data_saham_perorangan = SahamInstitusi::leftJoin('rekening_institusis','rekening_institusis.id','saham_institusis.institusi_id')
                            ->select('nm_investor','no_register','nm_institusi','kota_institusi','provinsi_institusi','negara_institusi','tipe_perusahaan',
                                    'no_cif','no_sk3s','seri_spmpkop','seri_formulir','jumlah_saham','karakteristik','bidang_usaha',
                                    'terbilang_saham','jenis_mata_uang','pembayaran_no_rek','pembayaran_nm_rek','pembayaran_nm_bank','institusi_id_lama',
                                    'saham_institusis.status_verifikasi')
                            ->whereBetween(DB::raw('DATE(saham_institusis.created_at)'), array($from, $to))
                            ->get();
            return Excel::create('data_saham_perorangan', function($excel) use ($data_saham_perorangan){
                $excel->sheet('data_investr', function($sheet) use ($data_saham_perorangan){
                    $sheet->fromArray($data_saham_perorangan);
                });
            })->download('xls');
            return redirect('manajer.laporan_nonperorangan')->with(['success'    =>  'Laporan sudah dicetak dalam bentuk microsoft excel !!']);
        }
    }
}
