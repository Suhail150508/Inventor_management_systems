<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'vendor_id',
        'invoice_id',
        'code',
        'qty',
        'unit_price',
        'total_price'
    ];
}

