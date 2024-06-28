<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main_account extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'total_amount',
        'customer_due',
        'supliyer_due',
        'amount_invest_id',
        'amount_withdraw_id',
        'purchase_id',
        'purchase_return_id',
        'sales_product_id',
        'return_product_id',
        'sales_amount',
        'unit_amount',
        'created_by',
        'updated_by',
    ];
}
