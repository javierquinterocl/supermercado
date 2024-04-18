<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'amount', 'price','image'];
    protected $guarded = ['id','created_at', 'updated_at'];
 public function orders()
 {
 return $this->hasMany(Order::class);
 }
}

