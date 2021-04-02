<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefStatus extends Model
{
    const PENDING = 'pending';
    use HasFactory;
    protected $table = 'ref_status';

    public function scopeStatus($query, $status)
    {
        return $query->where('title', $status)->first();
    }
}
