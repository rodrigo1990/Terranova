<script>
			$(window).ready(function(){
					

				@if(isset($msg))

				var msg = <?php echo $msg ?>;
				
					switch(msg){
						case 'create':
							alert('¡Producto creado con exito!');

						break;

						case 'destroy':
							alert('¡Producto eliminado con exito!');

						break;

						case 'update':
							alert('¡Producto actualizado con exito!');

						break;
					}

				@endif

			});
		</script>