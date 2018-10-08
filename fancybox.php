<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require "partials/css.html" ?>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.css">
</head>
<body>

	<div class="container">
		<?php require "partials/header.php" ?>

		<h1>ejemplo fancybox</h1>

		<a data-fancybox="gallery" href="https://www.einerd.com.br/wp-content/uploads/2017/06/dragon-ball-super-050-05-goku.jpg">
			<img src="https://www.einerd.com.br/wp-content/uploads/2017/06/dragon-ball-super-050-05-goku.jpg" height="200" width="300">
		</a>
		<a data-fancybox="gallery" href="https://img.youtube.com/vi/yHGSR2OTnPU/maxresdefault.jpg">
			<img src="https://img.youtube.com/vi/yHGSR2OTnPU/maxresdefault.jpg" height="200" width="300">
		</a>

		<hr>

		
		<div style="display: none;" id="hidden-content">
			<div>
				<form>
					<label class="label-danger">Nombre</label>
					<input type="" placeholder="Nombre" name="">
					<label class="label-danger">Apellidos</label>
					<input type="" placeholder="Apellidos" name="">
					<hr>
					<table id="example" >
				       	 <thead>
				       	 	<tr>
				       	 		<!-- <td><strong>id</strong></td> -->
				       	 		<td><strong>Nombres</strong></td>
				       	 		<td><strong>Apellidos</strong></td>
				       	 		<td><strong>Email</strong></td>
				       	 		<td><strong>Option</strong></td>
				       	 		<td><strong>Option</strong></td>
				       	 	</tr>
				       	 </thead>
				       	 <tbody></tbody>
				       
				    </table>
				</form>
			</div>
		</div>


		<a data-fancybox data-src="#hidden-content" class="btn btn-primary" href="javascript:;">
			Trigger the fancybox
		</a>
	</div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.js"></script>
	<!-- -->


	<script>
		$(document).ready(function($) {
			// $('[data-fancybox="gallery"]').fancybox({
			// 	button:true
			// });
			$().fancybox({
			    selector : '.imglist a:visible'
			});

			get_user();


		});

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
		                   // {"data" : "id", "visible":false},
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
		            })/*.fnDestroy()*/;

		           
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