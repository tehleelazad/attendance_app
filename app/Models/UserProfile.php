<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'userprofile';

    protected $fillable = [
        'fullname',
        'lastname',
        'profileimage',
        'address',
        'contact',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}