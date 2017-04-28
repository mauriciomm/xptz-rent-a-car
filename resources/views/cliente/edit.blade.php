<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cadastro.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/menu.css') }}">
		<title>Editcar Clientes</title>
	</head>
	<body>
		@include('menu')
		<h2>XPTZ Rent a Car - Editar Clientes</h2>        
		@include('cliente.form')
    </body>
</html>

