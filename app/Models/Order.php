<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart', 'tailorId', 'userId', 'status', 'shippingaddress', 'shippingcity', 'shippingdistrict', 'shippingcontact',
        'description', 'measurements', 'budget', 'fabric', 'image', 'amount',
    ];
    
    protected $casts = [
        'cart' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function tailor()
    {
        return $this->belongsTo(User::class, 'tailorId', 'id');
    }
}
