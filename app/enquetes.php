<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enquetes extends Model
{
    protected $fillable = [
        'n_pension',
        'nom',
        'demande',
        'reponse',
        'periode',
        'emp',
        'obs',

        ];
}
