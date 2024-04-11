<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    // use HasFactory;
    protected $table = "brands";
    
    public function getcategories(){
        return $this->hasMany(Category::class);
    }

    public function getproducts(){
        return $this->hasMany(Product::class);
    }

}
