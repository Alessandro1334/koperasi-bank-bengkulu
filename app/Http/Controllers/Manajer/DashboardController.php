<?php

namespace App\Http\Controllers\Manajer;

use App\AgenPemasaran;
use Gate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Investor;
use App\KetuaKoperasi;
use App\SahamInvestor;
use App\RekeningInstitusi;
use App\SahamInstitusi;
use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('isManajer')){
            abort(404, "Sorry, you can't do this actions");
        }

        $investor = Investor::count();
        $saham_investor = SahamInvestor::count();
        $institusi = RekeningInstitusi::count();
        $saham_institusi = SahamInstitusi::count();
        $ketua = KetuaKoperasi::count();
        $ketua_aktif = KetuaKoperasi::where('status','1')->count();
        $operator = User::where('level_user','operator')->count();
        $manajer = User::where('level_user','manajer')->count();
        $agen = AgenPemasaran::count();
        return view('manajer.dashboard',compact('investor','saham_investor','ketua_aktif','institusi','saham_institusi','ketua','operator','manajer','agen'));
    }
}
