<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_invoice extends Model
{
    // use HasFactory;

    protected $fillable = [
        'id',
        'vendor_id',
        'sub_total',
        'discount',
        'paid',
        'due',
        'total',
        'status'
    ];

    // protected $primaryKey = 'id';
// protected $visible = ['id',/* other attributes */];
}
