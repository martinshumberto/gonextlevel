<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['cep', 'address', 'number', 'district', 'city', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
