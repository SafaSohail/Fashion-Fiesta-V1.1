<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 'tailorId'
    ];
    public function tailor()
    {
        return $this->hasMany(User::class, 'id', 'tailorId');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
