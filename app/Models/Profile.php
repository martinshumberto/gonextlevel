<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['cpf', 'birth_date', 'phone', 'cell_phone'];
}
