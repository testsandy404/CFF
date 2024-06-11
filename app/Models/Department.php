<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    // use HasFactory;
    protected $table = "departments";

    public function vendors(){
        return $this->hasMany(Vendor::class, 'dept_id');
    }
}
