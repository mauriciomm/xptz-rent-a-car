<!DOCTYPE html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<title>Clientes</title>
	</head>
	<body>
		@include('menu')
		<h2>XPTZ Rent a Car - Clientes</h2>
		<div id="btnCadastrar">
			<a href="{{route('cliente.create')}}" class="btn">Cadastrar clientes</a>
		</div>
		<br/><br/>
		<table border="1">
			<tr >
				<th>Nome</th>
				<th>CPF</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>Ações</th>
			</tr>
			@foreach ($clientes as $cliente)
			<tr>
				<td>{{$cliente->nome}}</td>
				<td>{{$cliente->cpf}}</td>
				<td>{{$cliente->email}}</td>
				<td>{{$cliente->telefone}}</td>
				<td>
					<a href="{{ route('cliente.edit', $cliente->id) }}" class="btn">
						Editar
					</a>
					<form onsubmit="return validate();" method="POST"
                        action="{{ route('cliente.destroy', $cliente->id) }}" 
                        data-message="Delete this Thing?" >
                        {{ csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="btn delete" value="Deletar" >
                    </form>
				</td>
			</tr>
			@endforeach
		</table>
		<script type="text/javascript">
			function validate(){
				return confirm('Você tem certeza?');
			} 
		</script>
	</body>
</html>