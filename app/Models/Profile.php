<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'cpf', 'birth_date', 'cell_phone', 'phone', 'avatar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
