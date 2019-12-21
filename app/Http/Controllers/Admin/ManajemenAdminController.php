<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class ManajemenAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::select('id','nm_admin','username','email')->get();
        return view('admin/manajemen_admin.index', compact('admins'));
    }

    public function add()
    {
        return view('admin/manajemen_admin.create');
    }

    public function addPost(Request $request)
    {
        $admin  = Admin::create([
            'nm_admin' =>   $request->nm_admin,
            'username'  =>  $request->username,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password)
        ]);
        if($admin){
            return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Ditambahkan !!']);
        }
    }

    public function edit($id)
    {
        $admin = Admin::where('id',$id)->select('id','nm_admin','email','username')->first();
        return $admin;
    }

    public function update(Request $request)
    {
        $admin = Admin::where('id',$request->id)->update([
            'nm_admin'   => $request->nm_admin,
            'username'   => $request->username,
            'email'  => $request->email,
        ]);
        if($admin){
            return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Diubah !!']);
        }
    }

    public function delete($id) {
        $admin = Admin::destroy($id);
        if($admin){
            return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Dihapus !!']);
        }
    }

    public function passUpdate(Request $request){
        return $request;
    }
}
