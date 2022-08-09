<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;
    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function models()
    {
        return $this->belongsTo(Models::class, 'model_id');
    }
    public function years()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }
}
