<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVeichle extends Model
{
    use HasFactory;
    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }
    public function model(){
        return $this->hasOne(Models::class, 'id', 'model_id');
    }
    public function year(){
        return $this->hasOne(ModelYear::class, 'id', 'year_id');
    }
}
