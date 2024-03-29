<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_product_invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'invoice_id',
        'code',
        'unit_price',
        'qty',
        'total_price'
    ];

    // Add this line to automatically manage timestamps
    public $timestamps = true;
}
