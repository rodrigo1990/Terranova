<script>
			$(window).ready(function(){
					

				@if(isset($msg))

				var msg = <?php echo $msg ?>;
				
					switch(msg){
						case 'create':
							alert('¡Proyecto creado con exito!');

						break;

						case 'destroy':
							alert('¡Proyecto eliminado con exito!');

						break;

						case 'update':
							alert('¡Proyecto actualizado con exito!');

						break;
					}

				@endif

			});
		</script>