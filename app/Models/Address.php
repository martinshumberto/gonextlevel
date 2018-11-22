<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['cep', 'street', 'number', 'district', 'city', 'state', 'profile_id', 'complement'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
