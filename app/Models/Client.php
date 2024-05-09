<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'document', 'address', 'phone','email','image','status','registerby'];
    protected $guarded = ['id','created_at', 'updated_at','status','registerby'];
}
