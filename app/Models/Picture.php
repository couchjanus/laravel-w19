<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    
    protected $fillable = ['filename'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
