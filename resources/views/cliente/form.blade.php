{!! Form::model($model, array('route' => $rota, 'method' => $method)) !!}
	
    <p>Nome: <input type="text" name="nome" id="nome" value="{{ $model->nome }}" required> </p>

    <p>CPF: <input type="text" name="cpf" id="cpf" value="{{ $model->cpf }}" required></p>

    <p>Email: <input type="text" name="email" id="email" value="{{ $model->email }}" required></p>

    <p>Telefone: <input type="number" name="telefone" id="telefone" value="{{ $model->telefone }}" required></p>

    <p><input type="submit" name="submit" value="{{$nomeBotao}}" class="btn"></p>

{!! Form::close() !!}