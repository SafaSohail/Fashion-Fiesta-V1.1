<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'tailorId', 'userId', 'rating', 'comment'
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
