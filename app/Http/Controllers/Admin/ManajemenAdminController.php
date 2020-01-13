<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Log;
use Auth;

class ManajemenAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

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

        $level = "administrator";
        $aksi = "menambahkan administrator baru";
        $halaman = "manajemen administrator";
        $log = new Log;
        $log->user_id = Auth::guard('admin')->user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();
        return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Ditambahkan !!']);
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
        $level = "administrator";
        $aksi = "mengubah data administrator";
        $halaman = "manajemen administrator";
        $log = new Log;
        $log->user_id = Auth::guard('admin')->user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();
        return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Diubah !!']);
    }

    public function delete(Request $request) {
        $admin = Admin::destroy($request->id);

        $level = "administrator";
        $aksi = "menghapus data administrator";
        $halaman = "manajemen administrator";
        $log = new Log;
        $log->user_id = Auth::guard('admin')->user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();
        return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Data Admin Berhasil Dihapus !!']);
    }

    public function passUpdate(Request $request){
        $admin = Admin::where('id',$request->id)->update([
            'password'  => Hash::make($request->password1),
        ]);
        $level = "administrator";
        $aksi = "mengubah password administrator";
        $halaman = "manajemen administrator";
        $log = new Log;
        $log->user_id = Auth::guard('admin')->user()->id;
        $log->level_user = $level;
        $log->aksi = $aksi;
        $log->halaman = $halaman;
        $log->save();
        return redirect()->route('administrator.manajemen_admin')->with(['success'   =>  'Password Berhasil Diubah !!']);
    }
}
