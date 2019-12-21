<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ManajemenManajerController extends Controller
{
    public function index()
    {
        $users = User::select('*')->where('level_user','manajer')->get();
        return view('admin/manajemen_manajer.index', compact('users'));
    }
}
