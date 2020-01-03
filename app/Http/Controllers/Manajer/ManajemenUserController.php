<?php

namespace App\Http\Controllers\Manajer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Gate;

class ManajemenUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $users = User::select('nm_user','username', 'email', 'password','level_user')->get();
        // return $users;
        return view('manajer/manajemen_user.index', compact('users'));
    }
}
