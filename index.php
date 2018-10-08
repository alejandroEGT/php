<?php 
require "clases/usuario.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOM TO THE APP</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php require'partials/header.php'; ?>

				<a href="login.php">Log in</a>
				<a href="registro_usuario.php">Registrate</a>
			</div>
		</div>

		<hr>
		
		<table id="example" class="table table-condensed" style="width:100%">
       	 <thead>
       	 	<tr>
       	 		<td><strong>id</strong></td>
       	 		<td><strong>Nombres</strong></td>
       	 		<td><strong>Apellidos</strong></td>
       	 		<td><strong>Email</strong></td>
       	 		<td><strong>Option</strong></td>
       	 		<td><strong>Option</strong></td>
       	 	</tr>
       	 </thead>
       	 <tbody></tbody>
       
    	</table>
	</div>
	<style type="text/css">
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
		  background: none;
		  color: black!important;
		  border-radius: 4px;
		  border: 1px solid #828282;
		}
		 
		.dataTables_wrapper .dataTables_paginate .paginate_button:active {
		  background: none;
		  color: black!important;
		}
	</style>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script> -->

	<script>
		var table;
		$(document).ready(function() {
		    get_user();

		} );

		function get_user() {
			$.ajax({
		     	method: "GET",
		        url: "indexController.php",
		        success : function(data) {
		            var o = JSON.parse(data);//A la variable le asigno el json decodificado

		            $('#example').css('background-color', 'blue');
		            $('#example thead').css('color', 'white');
		            $('#example').dataTable( {
		                data : o,
		                columns: [
		                    {"data" : "id", "visible":false},
		                    {"data" : "nombres"},
		                    {"data" : "apellidos"},
		                    {"data" : "email"},
		                    {
				                sTitle: "Accion",
				                mDataProp: "id",
				                sWidth: '7%',
				                orderable: false,
				                render: function(data) {
				                    acciones = `<a href="showUser.php?id=` + data + `" class="btn btn-success btn-xs accionesTabla">
				                                    Ver
				                                </a>`;
				                    return acciones
				                }
				            },
				            {
				                sTitle: "Accion",
				                mDataProp: "id",
				                sWidth: '7%',
				                orderable: false,
				                render: function(data) {
				                    acciones = `<button type='button' onClick="click_delete(` + data + `)" class="btn btn-danger btn-xs accionesTabla">
				                                    Eliminar
				                                </button>`;
				                    return acciones
				                }
				            }

		                ],
		                bDestroy: true, //permitir destruir datos de la tabla
		                searching: true,//mostrar buscador
		                paging:true, //mostrar paginador
		                info:true, //mostrar informacion
		                ordering: true, //mostrar ordenador de columnas
		                
		                language:{
						    "sProcessing":     "Procesando...",
						    "sLengthMenu":     "Mostrar _MENU_ registros",
						    "sZeroRecords":    "No se encontraron resultados",
						    "sEmptyTable":     "Ningún dato disponible en esta tabla",
						    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
						    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
						    "sInfoPostFix":    "",
						    "sSearch":         "Buscar:",
						    "sUrl":            "",
						    "sInfoThousands":  ",",
						    "sLoadingRecords": "Cargando...",
						    "oPaginate": {
						        "sFirst":    "Primero",
						        "sLast":     "Último",
						        "sNext":     "Siguiente",
						        "sPrevious": "Anterior"
						    },
						    "oAria": {
						        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
						    }
						}
		            });

		           
		        }       
		    });
		}

		/*Borrar un usuario*/
		function click_delete(id) {
			var confirmar = confirm("Deseas borrar?");

			if (confirmar == true){

				$.ajax({
					url: 'controller/deleteUserController.php',
					type: 'POST',
					//dataType: '',
					data: {id_user: id},
				})
				.done(function() {
					
					get_user();


				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}
			
		}
	</script>
</body>
</html>