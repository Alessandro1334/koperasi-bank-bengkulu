<?php

namespace App\Http\Controllers\Manajer;
use Gate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        return view('manajer.dashboard');
    }
}
