<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','order_id','type','card_type','card','amount','date','payment_id','status','created_at'
    ];
}
