<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Hash;

class Client extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'household' => Hash::class
    ];
}
