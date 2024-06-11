<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    protected $fillable = [
        'type',
        'pattern',
        'fillw',
        'size',
        'finner',
        'fouter',
        'note',
        'datetime',
        'status',
        'customer',
    ];
    public $timestamps = false;
}