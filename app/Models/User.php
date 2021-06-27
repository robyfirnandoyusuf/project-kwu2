<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    // protected $with = ['ref_status', 'image', 'ref_role'];
    protected $appends = ['created_date'];

    const ROLE_ADMIN = 'admin';
    const ROLE_AGENT = 'agent';
    const ROLE_USER = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedDateAttribute()
    {
        return (new Carbon($this->attributes['created_at']))->format('d/m/Y');
    }

    public function ref_status()
    {
        return $this->hasOne(RefStatus::class, 'ref', 'active_status');
    }

    public function ref_role()
    {
        return $this->hasOne(RefRole::class, 'ref', 'role');
    }

    public function image()
    {
        return $this->hasOne(Media::class, 'id', 'image_id');
    }

    public function media()
    {
        return $this->hasOne(Media::class, 'id', 'image_id')->where('type', Media::AVATAR);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];
    }
}
