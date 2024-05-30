<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id','name','slug','banner_image','featured_image','description','excerpt','max_price','number_of_rating','meta_description','schema','robots','utm_campaign','utm_source','status','created_at',
    ];
}