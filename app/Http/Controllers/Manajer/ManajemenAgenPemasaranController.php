<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AgenPemasaran;

class ManajemenAgenPemasaranController extends Controller
{
    public function index(){
        $agens = AgenPemasaran::all();
        return view('manajer/manajemen_agen_pemasaran.index',compact('agens'));
    }

    public function post(Request $request){
        $agen = new AgenPemasaran;
        $agen->nm_agen_pemasaran = $request->nm_agen_pemasaran;
        $agen->email = $request->email;
        $agen->telephone = $request->telephone;
        $agen->save();

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
        if($admin){
            return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Diubah !!']);
        }
    }

    public function delete(Request $request) {
        $agen = AgenPemasaran::destroy($request->id);
        if($admin){
            return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Dihapus !!']);
        }
    }
}
