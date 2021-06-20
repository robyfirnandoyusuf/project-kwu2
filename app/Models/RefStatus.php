<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefStatus extends Model
{
    const PENDING = 'pending';
    const ACCEPT = 'accept';

    const STATUS_ACTIVE = 1;
    const STATUS_NON_ACTIVE = 2;
    const STATUS_DELETE = 13;

    const STATUS_WAITING = 11;
    const STATUS_ACCEPT = 12;
    const STATUS_CANCEL = 7;

    use HasFactory;
    protected $table = 'ref_status';

    public function scopeStatus($query, $status)
    {
        return $query->where('title', $status)->first();
    }
}
