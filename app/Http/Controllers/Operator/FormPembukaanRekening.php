<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormPembukaanRekening extends Controller
{
    public function index(){
        return view('operator/form_pembukaan_rekening.index');
    }
}
