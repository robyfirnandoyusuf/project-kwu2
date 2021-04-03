<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefDistrict extends Model
{
    use HasFactory;
    public function city() 
    {
        return $this->hasOne(RefCity::class, 'id', 'city_id');
    }
}
