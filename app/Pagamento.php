<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
	protected $table = 'pagamento';
	
    protected $fillable = [
    	'id',
        'num_cartao',
        'nome_cartao',
        'id_pagamento',
        'codigo',
        'validade',
        'updated_at',
        'created_at'
    ];
}
