<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer_invoice extends Model
{
    use HasFactory;

    protected $fillable =['id','investor_id','total_amount','due_amount','date','status'];


    public function Investor(){

       return $this->belongsTo(Investor::class,'investor_id');
    }

}
