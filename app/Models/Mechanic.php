<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $appends = ['my_brands', 'my_brand_names'];
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'mechanic_brands','mechanic_id','brand_id');
    }
    public function getMyBrandsAttribute(){
        return $this->brands->pluck('id')->toArray();
    }
    public function getMyBrandNamesAttribute(){
        return $this->brands->pluck('name')->toArray();
    }
}
