<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Sbpattern extends Model
{
    protected $fillable = ['key','detail','status'];
    public $timestamps = false;

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function status(): Attribute
    {
        return new Attribute(
            get: fn($value) => ["Tidak Tersedia", "Tersedia",][$value],
        );
    }
}