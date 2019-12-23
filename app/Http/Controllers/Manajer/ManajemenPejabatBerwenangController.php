<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PejabatBerwenang;
use Gate;

class ManajemenPejabatBerwenangController extends Controller
{
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
        return redirect()->route('manajer.manajemen_pejabat_berwenang')->with(['success'   =>  'Data Pejabat Berwenang Berhasil Diubah !!']);
    }

    public function delete(Request $request) {
        $pejabat = PejabatBerwenang::destroy($request->id);
        return redirect()->route('manajer.manajemen_pejabat_berwenang')->with(['success'   =>  'Data Pejabat Berwenang Berhasil Dihapus !!']);
    }

    public function aktifkanStatus($id){
        $pejabat = PejabatBerwenang::where('id',$id)->update([
            'status'    =>  '1',
        ]);

        return $pejabat;
    }

    public function nonAktifkanStatus($id){
        $pejabat = PejabatBerwenang::where('id',$id)->update([
            'status'    =>  '0',
        ]);

        return $pejabat;
    }
}
