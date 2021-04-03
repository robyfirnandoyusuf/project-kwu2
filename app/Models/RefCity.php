<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefCity extends Model
{
    use HasFactory;

    public function province()
    {
        return $this->hasOne(RefProvince::class, 'id', 'province_id');
    }
}
