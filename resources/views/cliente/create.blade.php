<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cadastro.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/menu.css') }}">
		<title>Cadastro de Clientes</title>
	</head>
	<body>
		@include('menu')
		<h2>XPTZ Rent a Car - Cadastro de Clientes</h2>        
		@include('cliente.form')

		<script type="text/javascript">
			$(document).ready(function(){
			    $('[name=telefone]').mask('(00) 0000-0000');
			});
		</script>
    </body>
</html>

