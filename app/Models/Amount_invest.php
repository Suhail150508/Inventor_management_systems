<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount_invest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function investor(){
        $this->belongsTo(Investor::class);
    }

    public function amount_withdraw()
    {
        return $this->hasManyThrough(
            Amount_withdraw::class,
            Investor::class,
            // 'country_id', // Foreign key on users table...
            // 'user_id', // Foreign key on posts table...
            // 'id', // Local key on countries table...
            // 'id' // Local key on users table...
        );
    }
}
