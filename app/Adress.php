<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'user_id', 'active', 'cep', 'logradouro', 'street', 'number', 'complement', 'city', 'uf'
    ];
}
