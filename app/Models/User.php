<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'cnic',
        'paymentType',
        'paymentNumber',
        'phone',
        'role',
        'area',
        'password',
        'avatar',
        'specialization',
        'price',
        'security_question',
        'security_answer',
        'customPrice',
        'pictures',
        'message',
        'status',
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
        'pictures' => 'array',
    ];

    public function tailorReviews()
    {
        return $this->hasMany(Review::class, 'tailorId', 'id');
    }
    
    public function userReviews()
    {
        return $this->hasMany(Review::class, 'userId', 'id');
    }
    
    public function tailorOrders()
    {
        return $this->hasMany(Order::class, 'tailorId', 'id');
    }
    
    public function userOrders()
    {
        return $this->hasMany(Order::class, 'userId', 'id');
    }
    /**
     * The channels the user receives notification broadcasts on.
     *
     * @return string
     */
    public function receivesBroadcastNotificationsOn()
    {
        return 'users.' . $this->id;
    }
}
