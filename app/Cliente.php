<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	protected $table = 'cliente';
	
    protected $fillable = [
        'id',
        'nome',
        'email',
        'cpf',
        'telefone',
        'created_at',
        'updated_at'
    ];
}
