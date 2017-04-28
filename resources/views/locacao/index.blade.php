<!DOCTYPE html>
<head>
	<meta name="csrf_token" content="{{ csrf_token() }}" />
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<title>Locação</title>
</head>
	<body>
		@include('menu')
		<h2>XPTZ Rent a Car - Devolução de Veículos</h2>
		<div id="btnCadastrar">
			<a href="{{route('locacao.create')}}" class="btn">Realizar Locações</a>
		</div>
		<br/><br/>
		<table border="1">
			<tr >
				<th>Locador</th>
				<th>CPF</th>
				<th>Carro</th>
				<th>Data de Inicio</th>
				<th>Data de Término</th>
				<th>Valor da Locação</th>
				<th>Ações</th>
			</tr>
			@foreach ($locacoes as $locacao)
			<tr>
				<td>{{$locacao->cliente}}</td>
				<td>{{$locacao->cpf}}</td>
				<td>{{$locacao->carro}}</td>
				<td>{{$locacao->data_inicio}}</td>
				<td>{{$locacao->data_termino}}</td>
				<td>R$ {{ number_format($locacao->valor)}}</td>
				<td>
					<form onsubmit="return validate();" method="POST"
                        action="{{ route('locacao.destroy', $locacao->id) }}" 
                        data-message="Delete this Thing?" >
                        {{ csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn" value="Realizar Devolução" >
                    </form> 
				</td>
			</tr>
			@endforeach
		</table>
		<script type="text/javascript">
			function validate(){
				return confirm('Confirma a devolução?');
			} 
		</script>
	</body>
</html>