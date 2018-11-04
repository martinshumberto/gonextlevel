<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'number', 'district', 'city', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
