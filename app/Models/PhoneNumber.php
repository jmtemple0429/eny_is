<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Hash;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $casts = [
        'number' => 'encrypted',
        'key'    => Hash::class,
        'label' => 'encrypted'
    ];
}
