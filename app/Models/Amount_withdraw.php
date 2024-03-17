<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount_withdraw extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function investor(){
        $this->belongsTo(Investor::class);
    }
}
