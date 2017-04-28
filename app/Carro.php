<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
	protected $table = 'carro';

    protected $fillable = [
        'id',
        'fabricante',
        'nome',
        'chassi',
        'valor',
        'ano',
        'potencia',
        'num_portas',
        'disponivel',
        'created_at',
        'updated_at'
    ];
}
