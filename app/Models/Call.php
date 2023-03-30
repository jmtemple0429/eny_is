<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Hash;

class Call extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'noggin_id' => 'encrypted',
        'address_key' => Hash::class,
        'address' => 'encrypted',
        'unit' => 'encrypted',
        'city' => 'encrypted',
        'county' => 'encrypted',
        'county_key' => Hash::class,
        'dispatcher' => 'encrypted'
    ];
}

