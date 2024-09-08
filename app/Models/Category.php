<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    
     // Define the reverse relationship to Blog model
     public function subCategories(): HasMany
     {
         return $this->hasMany(SubCategory::class);
     }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
