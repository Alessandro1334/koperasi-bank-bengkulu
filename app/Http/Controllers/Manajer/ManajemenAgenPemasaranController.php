<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AgenPemasaran;
use App\Log;
use Auth;
use Gate;

class ManajemenAgenPemasaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $agens = AgenPemasaran::all();
        return view('manajer/manajemen_agen_pemasaran.index',compact('agens'));
    }

    public function post(Request $request){
        $agen = new AgenPemasaran;
        $agen->nm_agen_pemasaran = $request->nm_agen_pemasaran;
        $agen->email = $request->email;
        $agen->telephone = $request->telephone;
        $agen->save();

        $level = "manajer";
        $aksi = "menambahkan agen pemasaran";
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('manajer.manajemen_agen_pemasaran')->with(['success'   =>  'Data Agen Pemasaran Berhasil Ditambahkan !!']);
    }

    public function edit($id)
    {
        $agen = AgenPemasaran::where('id',$id)->select('id','nm_agen_pemasaran','email','telephone')->first();
        return  $agen;
    }

    public function update(Request $request)
    {
        $agen = AgenPemasaran::where('id',$request->id)->update([
            'nm_agen_pemasaran'   => $request->nm_agen_pemasaran,
            'telephone'   => $request->telephone,
            'email'  => $request->email,
        ]);

        $level = "manajer";
        $aksi = "mengubah data agen pemasaran id = ".$request->id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('manajer.manajemen_agen_pemasaran')->with(['success'   =>  'Data Agen Pemasaran Berhasil Diubah !!']);
    }

    public function delete(Request $request) {
        $agen = AgenPemasaran::destroy($request->id);

        $level = "manajer";
        $aksi = "menghapus data agen pemasaran id = ".$request->id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return redirect()->route('manajer.manajemen_agen_pemasaran')->with(['success'   =>  'Data Agen Pemasaran Berhasil Dihapus !!']);
    }

    public function aktifkanStatus($id){
        $agen = AgenPemasaran::where('id',$id)->update([
            'status'    =>  '1',
        ]);

        $level = "manajer";
        $aksi = "mengaktifkan agen pemasaran id = ".$id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return $agen;
    }

    public function nonAktifkanStatus($id){
        $agen = AgenPemasaran::where('id',$id)->update([
            'status'    =>  '0',
        ]);

        $level = "manajer";
        $aksi = "menonaktifkan agen pemasaran id = ".$id;
        $halaman = "manajemen agen pemasaran";
        $log = new Log;
        $log->user_id = Auth::user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();

        return $agen;
    }
}
