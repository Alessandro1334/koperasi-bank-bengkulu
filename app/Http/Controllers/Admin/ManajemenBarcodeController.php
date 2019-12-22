<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barcodes;
use File;

class ManajemenBarcodeController extends Controller
{
    public function index()
    {
        $barcodes = Barcodes::all();
        return view('admin/manajemen_barcode.index', compact('barcodes'));
    }

    public function addPost(Request $request)
    {
        $file   = $request->file('nm_file');
        $nm_file = $file->getClientOriginalName();
        $file->move('img',$file->getClientOriginalName());
        $barcode  = Barcodes::insert([
            'nm_file'       =>  $nm_file,
            'keterangan'    =>  $request->keterangan,
            'status'        =>  $request->status,
        ]);
        if($barcode){
            return redirect()->route('administrator.manajemen_barcode')->with(['success'   =>  'Data Barcode Berhasil Ditambahkan !!']);
        }
    }

    public function edit($id)
    {
        $user = Barcodes::where('id',$id)->select('id','nm_file','keterangan','status')->first();
        return $user;
    }

    public function update(Request $request)
    {
        $file = $request->file('nm_file');
        if($request->hasFile('nm_file')) {
            $id = Barcodes::find($request->id);
            File::delete('img/'.$id['nm_file']);
            $nm_file = $file->getClientOriginalName();
            $file->move('img',$file->getClientOriginalName());
            $barcode  = Barcodes::where('id',$request->id)->update([
                'nm_file'       =>  $nm_file,
                'keterangan'    =>  $request->keterangan,
                'status'        =>  $request->status,
            ]);
        }else{
            $barcode = Barcodes::where('id',$request->id)->update([
                'keterangan'    =>  $request->keterangan,
                'status'        =>  $request->status,
            ]);
        }
        if($request->status = 'aktif') {
            Barcodes::where('status','aktif')->update([
                'status'    => 'tdk_aktif'
            ]);
            Barcodes::where('id',$request->id)->update([
                'status'    => 'aktif'
            ]);
        }
        return redirect()->route('administrator.manajemen_barcode')->with(['success'   =>  'Data Barcode Berhasil Diubah !!']);
    }

    public function delete(Request $request)
    {
        $id = Barcodes::find($request->id);
        File::delete('img/'.$id['nm_file']);
        $barcode = Barcodes::destroy($request->id);
        if($barcode){
            return redirect()->route('administrator.manajemen_barcode')->with(['success'   =>  'Data Barcode Berhasil Dihapus !!']);
        }
    }
}
