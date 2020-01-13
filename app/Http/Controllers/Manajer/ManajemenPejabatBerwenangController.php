<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PejabatBerwenang;
use App\Log;
use Auth;
use Gate;

class ManajemenPejabatBerwenangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $pejabats = PejabatBerwenang::all();
        return view('manajer/manajemen_pejabat_berwenang.index',compact('pejabats'));
    }

    public function post(Request $request){
        $pejabat = new PejabatBerwenang;
        $pejabat->nm_pejabat_berwenang = $request->nm_pejabat_berwenang;
        $pejabat->email = $request->email;
        $pejabat->telephone = $request->telephone;
        $pejabat->save();

        $level = "manajer";
        $aksi = "menambahkan agen pemasaran";
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('manajer.manajemen_pejabat_berwenang')->with(['success'   =>  'Data Pejabat Berwenang Berhasil Ditambahkan !!']);
    }

    public function edit($id)
    {
        $pejabat = PejabatBerwenang::where('id',$id)->select('id','nm_pejabat_berwenang','email','telephone')->first();
        return  $pejabat;
    }

    public function update(Request $request)
    {
        $pejabat = PejabatBerwenang::where('id',$request->id)->update([
            'nm_pejabat_berwenang'   => $request->nm_pejabat_berwenang,
            'telephone'   => $request->telephone,
            'email'  => $request->email,
        ]);

        $level = "manajer";
        $aksi = "mengubah data pejabat berwenang id = ".$request->id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('manajer.manajemen_pejabat_berwenang')->with(['success'   =>  'Data Pejabat Berwenang Berhasil Diubah !!']);
    }

    public function delete(Request $request) {
        $pejabat = PejabatBerwenang::destroy($request->id);

        $level = "manajer";
        $aksi = "menghapus data pejabat berwenang id = ".$request->id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('manajer.manajemen_pejabat_berwenang')->with(['success'   =>  'Data Pejabat Berwenang Berhasil Dihapus !!']);
    }

    public function aktifkanStatus($id){
        $pejabat = PejabatBerwenang::where('id',$id)->update([
            'status'    =>  '1',
        ]);
        $level = "manajer";
        $aksi = "mengaktifkan pejabat berwenang id = ".$id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();
        return $pejabat;
    }

    public function nonAktifkanStatus($id){
        $pejabat = PejabatBerwenang::where('id',$id)->update([
            'status'    =>  '0',
        ]);
        $level = "manajer";
        $aksi = "menonaktifkan pejabat berwenang id = ".$id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();
        return $pejabat;
    }
}
