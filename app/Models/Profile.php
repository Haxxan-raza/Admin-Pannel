<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'profile',
        'descripition',
        'agegroup',
        'city_name'

    ];
    public function profile()
    {
        return $this->belongsTo(User::class);
    }
}
