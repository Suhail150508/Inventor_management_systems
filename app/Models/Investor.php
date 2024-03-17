<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected static $logName = 'static';

    public function invest_amount(){
        $this->hasOne(Amount_invest::class);
    }
    public function return_amount(){
        $this->hasOne(Amount_withdraw::class);
    }
}
