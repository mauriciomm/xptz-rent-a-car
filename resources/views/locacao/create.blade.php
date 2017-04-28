<!DOCTYPE html>
<head>
	<meta name="csrf_token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/cadastro.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/menu.css') }}">
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<title>Locação</title>
</head>
<body>
	@include('menu')
	<h2>XPTZ Rent a Car - Locação de Veículos</h2>
	@include('locacao.form')

	<script>
		$('select[name="fabricante"]').on('change', function() {
            var fabricante = $(this).val();
            var selcarros = $('select[name="id_carro"]');
            $.ajax({
			    method: 'POST', // Type of response and matches what we said in the route
			    url: '/locacao/buscaclientes', // This is the url we gave in the route
			    beforeSend: function (xhr) {
		            var token = $('meta[name="csrf_token"]').attr('content');
		            if (token) {
		                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		            }
		        },
			    data: {'id' : fabricante}, // a JSON object to send back
			    datatype: 'json',
			    success: function(response){ // What to do if we succeed
			    	console.log(response);
			    	response = jQuery.parseJSON(response);
			    	selcarros.children().remove();
			    	if (response.length > 0) {
				    	$.each(response, function(index, carro) {
						    var $opt = $('<option/>');
						    $opt.val(carro.id);
						    $opt.text(carro.nome + ' - ' + carro.ano + ' - ' + carro.num_portas + 'P - ' + carro.potencia + ' cv');
						    selcarros.append($opt);
						});
				    }
				    else {
				    	var $opt = $('<option/>');
				    	$opt.val("");
						$opt.text("--- Selecione um Fabricante ---");
						selcarros.append($opt);
				    }
			    },
			    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
			        //console.log(JSON.stringify(jqXHR));
			        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			    }
			});
        });

        $('#data_termino').blur(function() {
            var data_termino = new Date($(this).val());
            var data_inicio =  new Date($('#data_inicio').val());

            var timeDiff = Math.abs(data_termino.getTime() - data_inicio.getTime());
			var diffDias = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

			if (data_termino < data_inicio) {
				alert('A data de término é menor que a de início');
			}

			else {
	            var id_carro = $('select[name="id_carro"]').val();
	            var valor = $('#valor');

	            $.ajax({
				    method: 'POST', // Type of response and matches what we said in the route
				    url: '/locacao/buscavalor', // This is the url we gave in the route
				    beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');
			            if (token) {
			                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
				    data: {
				    	'id_carro' : id_carro
				    }, // a JSON object to send back
				    datatype: 'json',
				    success: function(response){ // What to do if we succeed
				    	// console.log(response.valor);
				    	response = jQuery.parseJSON(response);
				    	$.each(response, function(index, carro) {
				    		var sum = diffDias * carro.valor;
						    valor.val(sum);
						});
				    },
				    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
				        //console.log(JSON.stringify(jqXHR));
				        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				    }
				});
	        	}
        });
	</script>

	
</body>