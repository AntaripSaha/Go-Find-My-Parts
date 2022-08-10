<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    public function styles()
    {
        return $this->belongsTo(Style::class, 'style_id');
    }
    public function partCategories()
    {
        return $this->belongsTo(PartCategory::class, 'category_id');
    }
}
