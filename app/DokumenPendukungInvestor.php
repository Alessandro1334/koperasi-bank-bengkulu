<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenPendukungInvestor extends Model
{
    protected $fillable = ['investor_id','ktp','npwp','form_profile_resiko_pemodal','bukti_setoran_investasi_awal','contoh_tanda_tangan','fatca'];
}
