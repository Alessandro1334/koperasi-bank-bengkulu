<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;

class BackupDataController extends Controller
{
    public function index(){
        return view('operator/backup_data.index');
    }
}
