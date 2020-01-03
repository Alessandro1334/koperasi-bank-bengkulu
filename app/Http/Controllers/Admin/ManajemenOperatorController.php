<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class ManajemenOperatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::select('*')->where('level_user','operator')->get();
        return view('admin/manajemen_operator.index', compact('users'));
    }

    public function addPost(Request $request)
    {
        $user  = User::create([
            'nm_user'   =>  $request->nm_user,
            'username'  =>  $request->username,
            'email'     =>  $request->email,
            'status'    =>  $request->status,
            'level_user'=>  'operator',
            'password'  =>  Hash::make($request->password)
        ]);
        if($user){
            return redirect()->route('administrator.manajemen_operator')->with(['success'   =>  'Data Admin Berhasil Ditambahkan !!']);
        }
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->select('id','nm_user','email','username','status')->first();
        return $user;
    }

    public function update(Request $request)
    {
        $user = User::where('id',$request->id)->update([
            'nm_user'       => $request->nm_user,
            'username'      => $request->username,
            'email'         => $request->email,
            'status'        => $request->status,
            'level_user'=>  'operator',
        ]);
        if($user){
            return redirect()->route('administrator.manajemen_operator')->with(['success'   =>  'Data Admin Berhasil Diubah !!']);
        }
    }

    public function delete(Request $request)
    {
        $user = User::destroy($request->id);
        if($user){
            return redirect()->route('administrator.manajemen_operator')->with(['success'   =>  'Data Admin Berhasil Dihapus !!']);
        }
    }

    public function ubahPass(Request $request)
    {
        $user = User::where('id',$request->id)->update([
            'password' => Hash::make($request->password)
        ]);
        if($user){
            return redirect()->route('administrator.manajemen_operator')->with(['success'   =>  'Password Berhasil Diubah !!']);
        }
    }
}
