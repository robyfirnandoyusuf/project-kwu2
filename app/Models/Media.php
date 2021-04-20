<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    const SLIDER = 'slider';
    const PROPERTY = 'property';
    const AVATAR = 'avatar';

    use HasFactory;
}
