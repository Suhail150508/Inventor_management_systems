<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'qty',
        'unit_price'
    ];
}

