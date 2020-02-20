<header>
	<div class="row">
		<div class="nav col-lg-12 hidden-md hidden-sm hidden-xs">
			<ul class="flex">
				<a id="cerrarMenu" class="close">
					<i class="fas fa-times"></i>
				</a>
				<li>
					<a id="nosotros-btn" onclick="scrollAnimate('nosotros',this)">
						NOSOTROS
					</a>
				</li>
				<li>
					<a onclick="scrollAnimate('nuestros-proyectos',this)">
						NUESTROS BARRIOS
					</a>
				</li>
				<li>
					<a href="/testimonios" target="_blank">
						TESTIMONIOS
					</a>
				</li>
				<li>
					<a  onclick="scrollAnimate('index',this)">
						<img class="logo" src="<?php echo asset('storage/img/logo-user.svg') ?>" alt="">
					</a>
				</li>
				<li>
					<a href="/preguntas-frecuentes" target="_blank">
						PREGUNTAS FRECUENTES
					</a>
				</li>
				<li>
					<a onclick="scrollAnimate('contacto',this)">
						CONTACTO
					</a>
				</li>
				<li>
					<ul class="rrss flex">
						<li>
							<a href="{{$fb}}" target="_blank" class="btn-icon">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<li>
							<a href="{{$ig}}" target="_blank" class="btn-icon">
								<i class="fab fa-instagram"></i>
							</a>
						</li>
						<li>
							<a href="{{$yt}}" target="_blank" class="btn-icon">
								<i class="fab fa-youtube"></i>
							</a>
						</li>
						<li>
							<a href="

							https://web.whatsapp.com/send?phone=5491169985042&text=Hola!%20me%20comunico%20desde%20terranova-sa.com.ar

							" target="_blank" class="btn-icon">
								<i class="fab fa-whatsapp"></i>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="hidden-lg col-md-12 col-sm-12 col-xs-12">
			<ul class="flex">
				<li class="float-left">
					<a href="">
						<img class="logo" src="<?php echo asset('storage/img/logo-user.svg') ?>" alt="">
					</a>
				</li>
				<li class="float-right">
					<a id="abrirMenu">
						<i class="fa fa-bars" id="abrirMenu-xs"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
</header>