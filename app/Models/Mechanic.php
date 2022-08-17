<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'mechanic_brands','mechanic_id','brand_id');
    }

    
}
