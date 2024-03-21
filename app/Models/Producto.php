<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'price', 'total_amount'];
    protected $guarded = ['id','created_at', 'updated_at'];

    public function orders()
 {
 return $this->hasMany(Order::class);
 }

}
