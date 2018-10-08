
 <?php 

 	$categoria = ['apples','banana','naranjas'];
 	$data1 = [88,22,31];
 	$data2 = [12,29,94];


  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<?php require "partials/css.html" ?>
 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.1.4/css/highcharts.css">
 </head>
 <body>

 	<style>
 		body { font: 12px arial; }
		label { display: block; }
		input {
		    box-sizing: border-box;
		  margin: 5px 0 15px 0;
		  padding: 5px;
		    width: 100%;
		  
		}
		textarea {
		  box-sizing: border-box;
		  font: 12px arial;
		    height: 200px;
		    margin: 5px 0 15px 0;
		  padding: 5px 2px;
		    width: 100%;  
		}
		.borderojo {
		    outline: none;
		    border: 1px solid #f00;
		}
		.bordegris { border: 1px solid #d4d4d; }
 	</style>
 	<div class="container">
 		<?php require "partials/header.php"; ?>

 		<div class="row">
 			<div class="col-md-3">
	 			<h4 id="nombre"></h4>
	 			<h6 id="email"></h6>
	 		</div>
	 		<div class="col-md-3">
	 			<a href="elementosjq.php" class="btn btn-primary">Ver elementos Jquery UI</a>
	 		</div>
	 		<div class="col-md-3">
	 			<a href="fancybox.php" class="btn btn-primary">Ver elementos fancybox</a>
	 		</div>
 		</div>
 		<hr>
 		<div id="charts"></div>

 		<hr>
 		<form>
		  <label>Caracteres restantes: <span></span></label>
		  <input type="text" maxlength="150" />
		  <label> Caracteres restantes: <span></span></label>
		  <textarea maxlength="150"></textarea>
		</form>

 	</div>
 </body>


 <!-- SCRIPTS JS -->

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

 <script src="https://code.highcharts.com/highcharts.js"></script>

 <script>

	 	$(document).ready(function($) {
	 		
	 		peticion();
	 		chart();
	 		count_caracter();

	 	});
	 	
	 	function peticion() {
	 		$.ajax({
	    		// la URL para la petición
			    url : "showUserController.php?id= <?php echo $_GET['id'] ?>",
			 
			    // la información a enviar
			    // (también es posible utilizar una cadena de datos)
			 
			    // especifica si será una petición POST o GET
			    type : 'GET',
			 
			    // el tipo de información que se espera de respuesta
			    dataType : 'json',
			
			    success : function(json) {
			    	console.log(json);
			    	$("#nombre").html(json['nombres']+' '+json['apellidos']);
			    	$("#email").html(json['email'])
			    },

			    error : function(xhr, status) {
			        alert('Disculpe, existió un problema');
			    },		 
			    // código a ejecutar sin importar si la petición falló o no
			    complete : function(xhr, status) {
			        //alert('Petición realizada');
			    }
			});
	 	}

	 	function chart() {
	 		var myChart = Highcharts.chart('charts', {
		        chart: {
		            type: 'bar'
		        },
		        title: {
		            text: 'Fruit Consumption'
		        },
		        xAxis: {
		            categories: <?= json_encode($categoria) ?>
		        },
		        yAxis: {
		            title: {
		                text: 'Fruit eaten'
		            }
		        },
		        series: [{
		            name: 'Jane',
		            data: <?= json_encode($data1) ?>
		        }, {
		            name: 'John',
		            data: <?= json_encode($data2) ?>
		        }]
		    });
	 		
	 	//  	var myChart = Highcharts.chart('charts', {

			//     title: {
			//         text: 'Solar Employment Growth by Sector, 2010-2016'
			//     },

			//     subtitle: {
			//         text: 'Source: thesolarfoundation.com'
			//     },

			//     yAxis: {
			//         title: {
			//             text: 'Number of Employees'
			//         }
			//     },
			//     legend: {
			//         layout: 'vertical',
			//         align: 'right',
			//         verticalAlign: 'middle'
			//     },

			//     plotOptions: {
			//         series: {
			//             label: {
			//                 connectorAllowed: false
			//             },
			//             pointStart: 2010
			//         }
			//     },

			//     series: [{
			//         name: 'Installation',
			//         data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
			//     }, {
			//         name: 'Manufacturing',
			//         data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
			//     }, {
			//         name: 'Sales & Distribution',
			//         data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
			//     }, {
			//         name: 'Project Development',
			//         data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
			//     }, {
			//         name: 'Other',
			//         data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
			//     }],

			//     responsive: {
			//         rules: [{
			//             condition: {
			//                 maxWidth: 500
			//             },
			//             chartOptions: {
			//                 legend: {
			//                     layout: 'horizontal',
			//                     align: 'center',
			//                     verticalAlign: 'bottom'
			//                 }
			//             }
			//         }]
			//     }

			// });
	 	}

	 	function count_caracter() {
	 		//var inputs = "input[maxlength], textarea[maxlength]";
    		$(document).on('keyup', "[maxlength]", function (e) {
		        	var este = $(this),
		            maxlength = este.attr('maxlength'),
		            maxlengthint = parseInt(maxlength),
		            textoActual = este.val(),
		            currentCharacters = este.val().length;
		            remainingCharacters = maxlengthint - currentCharacters,
		            espan = este.prev('label').find('span');            
		            // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
		            if (document.addEventListener && !window.requestAnimationFrame) {
		                if (remainingCharacters <= -1) {
		                    remainingCharacters = 0;            
		                }
		            }
		            espan.html(remainingCharacters);
		            if (!!maxlength) {
		                var texto = este.val(); 
		                if (texto.length >= maxlength) {
		                    este.removeClass().addClass("borderojo");
		                    este.val(text.substring(0, maxlength));
		                    e.preventDefault();
		                }
		                else if (texto.length < maxlength) {
		                    este.removeClass().addClass("bordegris");
		                }   
		            }   
		        });
	 	}
 </script>
 </html>
