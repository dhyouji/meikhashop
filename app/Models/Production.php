<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['id','preorder','taskst','note','datetime','staff','status'];
    protected $guarded = [];
    public $timestamps = false;
}
