<?php

namespace App;

use App\Models\Address;
use App\Models\Profile;
use App\Models\Prospect;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['profile', 'prospects'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function prospects()
    {
        return $this->hasMany(Prospect::class);
    }
}
