<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ManajemenOperatorController extends Controller
{
    public function index() 
    {   
        $users = User::select('*')->where('level_user','operator')->get();
        return view('admin/manajemen_operator.index', compact('users'));
    }
}
