<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedSession extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','order_id','user_id','batch_id','session_start','session_end','status','created_at'
    ];
}
