<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devolucao extends Model
{
	protected $table = 'devolucao';
	
    protected $fillable = [
    	'id',
        'id_cliente',
        'id_carro',
        'data_devolucao',
        'valor_final',
        'updated_at',
        'created_at'
    ];
}
