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
        return $this->hasOne(PropertyImage::class, 'property_id', 'id')->orderBy('sequence')->first();
    }

    public function gallery()
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'id')->orderBy('sequence');
    }
}
