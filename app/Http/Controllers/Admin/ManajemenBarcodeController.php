<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Barcodes;

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
        // $file   = $request->file('nm_file');
        if(!empty($file)) {
            echo 'successfully';
            // $nm_file = $file->getClientOriginalName();
            // $file->move('img',$file->getClientOriginalName());
            // $barcode  = Barcodes::insert([
            //     'nm_file'       =>  $nm_file,
            //     'keterangan'    =>  $request->keterangan,
            //     'status'        =>  $request->status,
            // ]);
            // File::delete();
        }
        // if($user){
        //     return redirect()->route('administrator.manajemen_operator')->with(['success'   =>  'Data Admin Berhasil Diubah !!']);
        // }
    }
}
