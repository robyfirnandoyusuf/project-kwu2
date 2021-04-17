<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    public function createby()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    public function property(){
        return $this->belongsTo(Property::class,'property_id');
      }
}
