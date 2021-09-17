<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    
    // By defaul id diye data delete update and store hoy.
    // Jodi amara onno kono kicho use korte chai se somoy ai vabe [getRouteKeyName] function e key ta mention kore dite hobe.
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
