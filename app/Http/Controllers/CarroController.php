<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;
use Illuminate\Support\Facades\DB;



class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Carro::all();
        $context = [
            'carros' => $carros
        ];

        return response()->view('carro.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carro = new Carro;
        $context = [
            'rota' => 'carro.store',
            'method' => 'post',
            'model' => $carro,
            'nomeBotao' => 'Cadastrar'
        ];
        return response()->view('carro.create', $context);
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

        $input['disponivel'] = 1;

        Carro::create($input);

        return redirect()->route('carro.index');

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
        $carro = DB::table('carro')->where('id', $id)->first();

        //dd($carro);

        $context = [
            'model' => $carro,
            'rota' => ['carro.update', $id],
            'method' => 'put',
            'nomeBotao' => 'Salvar'
        ];

        return response()->view('carro.edit', $context);
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
        $input = $request->except('_token', '_method', 'submit');
        DB::table('carro')->where('id',$id)->update($input);

        return redirect()->route('carro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Carro::destroy($id);
        return redirect()->route('carro.index');
    }
}