<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'user_id', 'active', 'cep', 'street', 'street', 'number', 'complement', 'city', 'uf'
    ];
}
