<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    //This is the ZipCode model
    protected $fillable = [
        'zip_code',
        'locality',
        'fe_key',
        'fe_name',
        'fe_code',
        'settlement_key',
        'settlement_name',
        'settlement_zone_type',
        'settlement_type_name',
        'municipality_key',
        'municipality_name'
    ];
}
