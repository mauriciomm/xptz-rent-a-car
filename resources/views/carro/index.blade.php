<!DOCTYPE html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<title>Carros</title>
	</head>
	<body>
		@include('menu')
		<h2>XPTZ Rent a Car - Carros</h2>
		<div id="btnCadastrar">
			<a href="{{route('carro.create')}}" class="btn">Cadastrar carros</a>
		</div>
		<br/><br/>
		<table border="1">
			<tr >
				<th>Fabricante</th>
				<th>Modelo</th>
				<th>Valor da Diária</th>
				<th>Portas</th>
				<th>Potência</th>
				<th>Disponível</th>
				<th>Ações</th>
			</tr>
			@foreach ($carros as $carro)
			<tr>
				<td>{{$carro->fabricante}}</td>
				<td>{{$carro->nome}}</td>
				<td>R$ {{number_format($carro->valor,2)}}</td>
				<td>{{$carro->num_portas}}</td>
				<td>{{$carro->potencia}} cv</td>
				<td>{{($carro->disponivel) ? 'Sim' : 'Não'}}</td>
				<td>
					<a href="{{ route('carro.edit', $carro->id) }}" class="btn">
						Editar
					</a>
					<form onsubmit="return validate();" method="POST"
                        action="{{ route('carro.destroy', $carro->id) }}" 
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