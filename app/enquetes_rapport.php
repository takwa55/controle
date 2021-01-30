<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enquetes_rapport extends Model
{
    protected $fillable = [
        'enquete_id',
        'file_name',
        'n_pension',

        ];
}
