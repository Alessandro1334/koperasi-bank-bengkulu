<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use App\PekerjaanInvestor;
use App\DokumenPendukungInvestor;
use App\DataPasanganOrangTuaInvestor;
use App\Persetujuan;
use App\AhliWarisInvestor;
use App\AgenPemasaran;
use App\PejabatBerwenang;
use App\SahamInvestor;
use Gate;
use App\Log;
use Auth;

class VerifikasiDataInvestorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $investors_acc = Investor::select('id','nm_investor','jenis_rekening','no_cif','jenis_kelamin','no_ktp','status_verifikasi')
                            ->where('status_verifikasi','!=','0')
                            ->get();
        $investors = Investor::select('id','nm_investor','jenis_rekening','no_cif','jenis_kelamin','no_ktp','status_verifikasi')
                            ->where('status_verifikasi','0')
                            ->get();
        $investor_pengalihans = SahamInvestor::join('investors','investors.id','saham_investors.investor_id')->select('investor_id','nm_investor')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        $agens = AgenPemasaran::where('status','1')->get();
        return view('manajer/verifikasi_data_investor.index', compact(['investors_acc','investors','pejabats','agens','investor_pengalihans']));
        // return $investors;
    }

    public function edit($id){
        $investor = Investor::where('id',$id)->select('id','nm_investor')->first();
        return $investor;
    }

    public function verifikasi(Request $request){
        $last = Investor::max('no_cif');

        // return $last;
        if($request->status_verifikasi == "1"){
            if($last == NULL || $last == ""){
                $investor = Investor::where('id',$request->investor_id)->update([
                    'status_verifikasi' => $request->status_verifikasi,
                    'no_cif'    =>  '00000',
               ]);
            }
            else{
                $no_urut = substr($last,0,5);
                $no_urut++;
                $investor = Investor::where('id',$request->investor_id)->update([
                    'status_verifikasi' => $request->status_verifikasi,
                    'no_cif'    => sprintf('%05s',$no_urut),
               ]);
            }

            $level = "manajer";
            $aksi = "menyetujui data investor";
            $halaman = "verifikasi data investor";
            $log = new Log;
            $log->user_id = Auth::user()->id;
            $log->level_user = $level;
            $log->aksi = $aksi;
            $log->halaman = $halaman;
            $log->save();
        }
        else{
            if($last == NULL || $last == ""){
                $investor = Investor::where('id',$request->investor_id)->update([
                    'status_verifikasi' => $request->status_verifikasi,
               ]);
            }
            else{
                $no_urut = substr($last,0,5);
                $no_urut++;
                $investor = Investor::where('id',$request->investor_id)->update([
                    'status_verifikasi' => $request->status_verifikasi,
               ]);
            }

            $level = "manajer";
            $aksi = "tidak menyetujui data investor";
            $halaman = "verifikasi data investor";
            $log = new Log;
            $log->user_id = Auth::user()->id;
            $log->level_user = $level;
            $log->aksi = $aksi;
            $log->halaman = $halaman;
            $log->save();
        }
        return redirect()->route('manajer.verifikasi_data_investor')->with(['success'   =>  'Data Investor Berhasil Diverifikasi !!']);
    }

    public function detail(Request $request){
        $investor = Investor::find($request->id_investor);
        $dokumen = DokumenPendukungInvestor::where('investor_id',$request->id_investor)->first();
        $pasangan = DataPasanganOrangTuaInvestor::where('investor_id',$request->id_investor)->first();
        $persetujuan = Persetujuan::where('investor_id',$request->id_investor)->first();
        $pekerjaan = PekerjaanInvestor::where('investor_id',$request->id_investor)->first();
        $agens = AgenPemasaran::where('status','1')->get();
        $pejabats = PejabatBerwenang::where('status','1')->get();
        return compact('investor','dokumen','pasangan','persetujuan','pekerjaan','agens','pejabats');
    }
}
