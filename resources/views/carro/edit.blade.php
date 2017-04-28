<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cadastro.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/menu.css') }}">
		<title>Editar Veículos</title>
	</head>
	<body>
		@include('menu')
		<h2>XPTZ Rent a Car - Editar Veículos</h2>        
		@include('carro.form')
    </body>
</html>

