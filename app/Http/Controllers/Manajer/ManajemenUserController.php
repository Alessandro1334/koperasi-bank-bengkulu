<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ManajemenUserController extends Controller
{
    public function index()
    {
        $users = User::select('nm_user','username', 'email', 'password','level_user')->get();
        // return $users;
        return view('manajer/manajemen_user.index', compact('users'));
    }
}
