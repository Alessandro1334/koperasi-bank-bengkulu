<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Barcodes;
use App\Admin;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $operators = User::where('level_user','operator')->count();
        $manajers = User::where('level_user','manajer')->count();
        $barcodes = Barcodes::count();
        $admins = Admin::count();
        return view('admin.dashboard',compact(['operators','manajers','barcodes','admins']));
    }
}
