<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SusunanKomisarisInstitusi extends Model
{
    protected $fillable = [
        'institusi_id','nm_komisaris','no_identitas'
    ];
}
