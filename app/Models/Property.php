<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Property extends Model
{
    protected $appends = ['new_date'];
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function thumbnail()
    {
        return $this->hasOne(Image::class, 'parent_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'parent_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function property_tags()
    {
        return $this->hasMany(PropertyTag::class, 'property_id', 'id');
    }

    public function facs()
    {
        return $this->hasMany(Facility::class, 'property_id', 'id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function getNewDateAttribute() {
        return (new Carbon($this->attributes['created_at']))->format('d/m/Y');
    }
}
