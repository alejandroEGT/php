<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require "partials/css.html" ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
</head>
<body> 
	<div class="container">
		<?php require "partials/header.php" ?>
		<h1>Elementos JQ ui</h1>

		<div class="ui-widget">
		  <label for="tags">Tags: </label>
		  <input class="form-control" id="tags">
		  <input id="show" type="hidden">

		  <button onclick="capturar_valor()">Capturar</button>
		</div>
	</div>





	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<script>
  $( function() {
    
	    $( "#tags" ).autocomplete({
	      	source: function (request, response) {
		        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
		        $.ajax({
		            url: 'controller/testController.php',
		             type: 'GET',
		             //data: {State:StateID},
		             dataType: 'json',
		             success: function (data) {

		                response($.map(data.slice(0,10), function(v,i){

		                    var text = v.nombre;
		                    if ( text && ( !request.term || matcher.test(text) ) ){
		                    	
		                         return {
		                              label: v.nombre,
		                              value: v.nombre,
		                              id: v.id
		                         };

		                         
		                    }
		                }));
		            },
		            
		        });
        	},
        	minLength:2,
			delay: 100,

			select: function(event, ui) {
				console.log(ui.item.id)
			    $("#show").val(ui.item.id);
			}
	    });
  } );

  function capturar_valor() {
  	alert($("#show").val());
  }
  </script>
</body>
</html>