<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wilayas extends Model
{
    protected $fillable = [
        'n_pension',
        'nom',
        'demande',
        'reponse',
        'periode',
        'emp',
        'rapport',

        ];
}
