{!! Form::model($model, array('route' => $rota, 'method' => $method)) !!}

    <p>Fabricante: <input type="text" name="fabricante" id="fabricante" value="{{ $model->fabricante }}" required></p>

    <p>Nome: <input type="text" name="nome" id="nome" value="{{ $model->nome }}" required></p>

    <p>Chassi: <input type="number" name="chassi" id="chassi" value="{{ $model->chassi }}" required></p>

    <p>Valor da Diária: R$ <input type="number" name="valor" id="valor" value="{{ $model->valor}}" required></p>

    <p>Ano: <input type="number" name="ano" id="ano" value="{{ $model->ano}}" required></p>

    <p>Potencia: <input type="number" name="potencia" id="potencia" value="{{ $model->potencia}}" required> cv</p>

    <p>Numero de Portas: <input type="number" name="num_portas" id="num_portas" value="{{ $model->num_portas}}" required></p>

    <p><input type="submit" name="submit" value="{{$nomeBotao}}" class="btn"></p>

{!! Form::close() !!}