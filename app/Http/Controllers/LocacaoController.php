<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locacao;
use App\Carro;
use App\Cliente;
use App\Pagamento;
use App\Devolucao;
use Illuminate\Support\Facades\DB;



class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locacoes = DB::table('locacao')
                        ->select(
                            'cliente.nome as cliente',
                            'cliente.cpf',
                            'carro.nome as carro',
                            'locacao.data_inicio',
                            'locacao.data_termino',
                            'locacao.valor',
                            'locacao.id'
                            )
                        ->join('cliente', 'locacao.id_cliente','=', 'cliente.id')
                        ->join('carro', 'locacao.id_carro','=', 'carro.id')->get();
   
        return response()->view('locacao.index', ['locacoes' => $locacoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carros = DB::table('carro')->select('fabricante')->distinct()->pluck('fabricante');
        $clientes = Cliente::all();
        
        $context = [
            'rota' => 'locacao.store',
            'method' => 'post',
            'model' => $carros,
            'clientes' => $clientes,
            'nomeBotao' => 'Realizar Locação'
        ];
        return response()->view('locacao.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token', 'submit');

        $input_pagamento['num_cartao'] = $input['num_cartao'];
        $input_pagamento['nome_cartao'] = $input['nome_cartao'];
        $input_pagamento['codigo'] = $input['codigo'];
        $input_pagamento['validade'] = $input['mes'] . '/' . $input['ano'] ;

        unset($input['num_cartao']);
        unset($input['nome_cartao']);
        unset($input['codigo']);
        unset($input['mes']);
        unset($input['ano']);

        $id_pagamento = Pagamento::create($input_pagamento)->id;

        $input['id_pagamento'] = $id_pagamento;

        Locacao::create($input);

        Carro::where('id', $input['id_carro'])->update(array('disponivel'=> 0 ));

        return redirect()->route('locacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locacao = [];
        $locacao = DB::table('locacao')->select('id_cliente', 'id_carro', 'valor')->where('id', $id)->first();

        Carro::where('id', $locacao->id_carro)->update(array('disponivel'=> 1 ));

        $input['data_devolucao'] = date('Y/m/d');
        $input['id_cliente'] = $locacao->id_cliente;
        $input['id_carro'] = $locacao->id_carro;
        $input['valor_final'] = $locacao->valor;

        Devolucao::create($input);
        Locacao::destroy($id);

        return redirect()->route('locacao.index');
    }

    public function buscaclientes(Request $request) {
        $fabricante = $request->get('id');
        $carros = DB::table('carro')->select('id','nome', 'ano', 'potencia', 'num_portas')->where('fabricante', $fabricante)->where('disponivel',1)->get();
        return json_encode($carros);
    }

    public function buscavalor(Request $request) {
        $id_carro = $request->get('id_carro');
        
        $valor = DB::table('carro')->select('valor')->where('id', $id_carro)->get();

        return json_encode($valor);
    }
}