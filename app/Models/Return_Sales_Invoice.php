<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Return_Sales_Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'sub_total',
        'discount',
        'total',
        'paid',
        'due'
    ];
}
