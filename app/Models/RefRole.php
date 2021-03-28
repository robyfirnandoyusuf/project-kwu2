<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefRole extends Model
{
    use HasFactory;
    const REF_ADMIN = 1;
    const REF_MITRA = 2;
    const REF_USER = 3;

    const TXT_ADMIN = 'Admin';
    const TXT_MITRA = 'Mitra';
    const TXT_USER = 'User';

    public function scopeOfLevel($query, $level)
    {
        return $query->where('title', $level);
    }
}
