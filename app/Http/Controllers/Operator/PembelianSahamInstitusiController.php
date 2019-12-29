<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembelianSahamInstitusiController extends Controller
{
    public function index(){
        if(!Gate::allows('isOperator')){
            abort(404, "Sorry, you can't do this actions");
        }

        return view('operator/form_saham_institusi.index',compact('saham_acc','sahams'));
    }
}
