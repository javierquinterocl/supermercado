<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps =false;

    protected $fillable = ['name', 'price', 'total_amount','provider_id'];
    protected $guarded = ['id'];

    public function orders()
 {
 return $this->hasMany(Detalles::class);
 }

}
