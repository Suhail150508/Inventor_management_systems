<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code',
        'total_purchase_qty',
        'product_unit_price',
        'total_sold_qty',
        'available_qty',
        'reserve_qty',
        'purchase_upcoming_qty',
        'saleable_qty'
    ];

}
