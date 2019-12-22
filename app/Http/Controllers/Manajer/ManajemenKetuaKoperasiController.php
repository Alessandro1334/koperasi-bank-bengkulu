<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KetuaKoperasi;

class ManajemenKetuaKoperasiController extends Controller
{
    public function index(){
        $ketuas = KetuaKoperasi::all();
        return view('manajer/manajemen_ketua_koperasi.index',compact('ketuas'));
    }

    public function post(Request $request){
        $ketua = new KetuaKoperasi;
        $ketua->nm_ketua_koperasi = $request->nm_ketua_koperasi;
        $ketua->email = $request->email;
        $ketua->telephone = $request->telephone;
        $ketua->save();

        return redirect()->route('manajer.manajemen_ketua_koperasi')->with(['success'   =>  'Data Ketua Koperasi Berhasil Ditambahkan !!']);
    }

    public function edit($id)
    {
        $ketua = KetuaKoperasi::where('id',$id)->select('id','nm_ketua_koperasi','email','telephone')->first();
        return  $ketua;
    }

    public function update(Request $request)
    {
        $ketua = KetuaKoperasi::where('id',$request->id)->update([
            'nm_ketua_koperasi'   => $request->nm_ketua_koperasi,
            'telephone'   => $request->telephone,
            'email'  => $request->email,
        ]);
        return redirect()->route('manajer.manajemen_ketua_koperasi')->with(['success'   =>  'Data Ketua Koperasi Berhasil Diubah !!']);
    }

    public function delete(Request $request) {
        $ketua = KetuaKoperasi::destroy($request->id);
        return redirect()->route('manajer.manajemen_ketua_koperasi')->with(['success'   =>  'Data Ketua Koperasi Berhasil Dihapus !!']);
    }

    public function aktifkanStatus($id){
        $ketua = KetuaKoperasi::query()->update([
            'status'    =>  '0'
        ]);
        $ketua = KetuaKoperasi::where('id',$id)->update([
            'status'    =>  '1',
        ]);

        return $ketua;
    }
}
