<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    // protected $appends = ['new_date'];
    use HasFactory;

    public function createby()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function thumbnail()
    {
        return $this->hasOne(PropertyImage::class, 'id', 'property_id');
    }

    public function gallery()
    {
        return $this->belongsToMany(Media::class, PropertyImage::class, 'property_id', 'media_id');
    }

    public function district() {
        return $this->hasOne(RefDistrict::class, 'id', 'district_id');
    }
}
