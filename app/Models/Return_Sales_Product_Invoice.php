<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Return_Sales_Product_Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'customer_id',
        'invoice_id',
        'code',
        'qty',
        'unit_price',
        'total_price'
    ];
}
