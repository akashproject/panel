<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferEarn extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','refer_by','refer_to','order_id','code','created_at'
    ];
}
