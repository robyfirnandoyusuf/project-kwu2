<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
class Withdraw extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function approveBy()
    {
        return $this->hasOne(User::class, 'id', 'approve_by');
    }

    public function getDibuatTglAttribute($date)
    {
        return Carbon::parse($date)->format('d/M/Y');
    }
}
