<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                XPTZ Rent a Car
            </div>
            <div>
              <img src="images/car.png">
          </div>
          <br/>
          <div class="links">
            <a class="menu btn" href="{{route('cliente.index')}}">Clientes</a> |  | 
            <a class="menu btn" href="{{route('carro.index')}}">Veículos</a> |  | 
            <a class="menu btn" href="{{route('locacao.index')}}">Locações e Devoluções</a> |  |
        </div>
    </div>
</div>
</body>
</html>
