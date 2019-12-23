<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;

class DashboardController extends Controller
{
    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }

        return view('operator.dashboard');
    }
}
