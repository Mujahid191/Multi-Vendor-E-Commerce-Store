<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Define the relationship to Category model
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }
}
