<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SusunanDireksiInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','nm_direksi','no_identitas'
    ];
}
