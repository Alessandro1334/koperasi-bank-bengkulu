<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenPendukungInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','kelengkapan_dokumen','profil_resiko','bukti_setoran','ttd_penerima_kuasa','fatca','persetujuan'
    ];
}
