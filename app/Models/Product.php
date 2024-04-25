<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'amount', 'price','image','status','registerby'];
    protected $guarded = ['id','created_at', 'updated_at','status','registerby'];
 public function orders()
 {
 return $this->hasMany(Order::class);
 }
}

