{!! Form::model($model, array('route' => $rota, 'method' => $method)) !!}
	
    <p>
	    Selecione: 
	    <select name="fabricante" id="fabricante">
	    	<option>--- Lista de Fabricantes ---</option>
			@foreach($model as $fabricante)
				<option value="{{$fabricante}}">{{$fabricante}}</option>
			@endforeach
		</select>
	</p>

	<p>
		Modelo:
		<select id="modelo" name="id_carro">
	    	<option>--- Selecione um Fabricante ---</option>
       </select>
	</p>

	<p>
		Clientes:
		<select name="id_cliente" id="id_cliente">
			<option>--- Selecione um Cliente ---</option>
			@foreach($clientes as $cliente)
				<option value="{{$cliente->id}}">{{$cliente->nome}} - CPF: {{ $cliente->cpf }}</option>
			@endforeach
		</select>
	</p>

	<p>
		Data de Ínicio: <input type="date" id="data_inicio" name="data_inicio" required>
	</p>
	<p>
		Data de Término: <input type="date" id="data_termino" name="data_termino" required>
	</p>

	<p>
		Valor do Aluguel: <input type="text" id="valor" name="valor" readonly>
	</p>
	<fieldset>
		<legend>Dados do Pagamento</legend>
		<p>
			Número do Cartão: <input type="number" name="num_cartao" required>
		</p>
		<p>
			Nome no Cartão: <input type="text" name="nome_cartao" required>
		</p>
		<p>
			Código: <input style="width:50px;" type="number" name="codigo" required maxlength="3">
			Validade:
			<select name="mes">
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<select name="ano">
				<option value="2017">2017</option>
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
				<option value="2026">2026</option>
			</select>
		</p>
	</fieldset>

	<p><input type="submit" name="submit" value="{{$nomeBotao}}" class="btn"></p>

{!! Form::close() !!}