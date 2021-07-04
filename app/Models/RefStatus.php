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

    const STATUS_PAYMENT = [
        'active' => 1,
        'non-active' => 2,
        'pending' => 3,
        'capture' => 4,
        'settlement' => 5,
        'deny' => 6,
        'cancel' => 7 ,
        'failure' => 8,
        'refund' => 9,
        'chargeback' => 10,
        'waiting' => 11,
        'accept' => 12,
        'delete' => 13,
        'expire' => 14
    ];

    use HasFactory;
    protected $table = 'ref_status';

    public function scopeStatus($query, $status)
    {
        return $query->where('title', $status)->first();
    }

    public function scopeRef($query, $ref)
    {
        return $query->where('ref', $ref)->first();
    }
}
