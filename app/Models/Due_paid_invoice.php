<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due_paid_invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'vendor_id',
        'paid_amount',
        'description'
    ];
}
