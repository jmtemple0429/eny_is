<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\Hash;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'address' => 'encrypted',
        'city'    => 'encrypted',
        'county' => 'encrypted',
        'county_key' => Hash::class
    ];

    protected $guarded = [];

    public function getAdultsAttribute() {
        $adults = 0;

        foreach($this->cases as $case) {
            $adults = $adults + $case->adults;
        }

        return $adults;
    }

    public function getRespondersAttribute() {
        $array = [];

        foreach($this->cases as $case) {
            $array[] = $case->first_responder;
            $array[] = $case->second_responder;
        }   

        return array_unique($array);
    }

    public function getChildrenAttribute() {
        $children = 0;

        foreach($this->cases as $case) {
            $children = $children + $case->children;
        }

        return $children;
    }

    public function cases() {
        return $this->hasMany(DisasterCase::class,"event","event");
    }
}
