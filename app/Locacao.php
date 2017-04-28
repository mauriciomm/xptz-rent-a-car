<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
	protected $table = 'locacao';
	
    protected $fillable = [
    	'id',
        'id_cliente',
        'id_carro',
        'id_pagamento',
        'data_inicio',
        'data_termino',
        'valor',
        'updated_at',
        'created_at'
    ];
}
