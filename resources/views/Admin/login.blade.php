@extends('admin.layouts.main')
@section('main')
      <div id="login" style="">
	<div class="wrapper fadeInDown">
	  <div class="formContent">
	    <!-- Tabs Titles -->

	    <!-- Icon -->
	    <div class="fadeIn first">
	      <img class="logo" src="<?php echo asset("storage/img/logo.png")?>" id="icon" alt="User Icon" style="width:200px" />
	    </div>

	    <!-- Login Form -->
	    <form>
			<input class="fadeIn second" type="text" name="username" id="username" placeholder="Ingrese su usuario" value="">
			<input class="fadeIn third" type="password" name="password" id="password" placeholder="Ingrese password" value="">

			<a class="form-btn fadeIn fourth" onClick="login()">INGRESAR</a>
			</form>

	    <!-- Remind Passowrd -->
	    <div id="formFooter">
	      <a class="underlineHover" href="http://www.AllSalud.com.ar">www.AllSalud.com.ar</a>
	    </div>

	  </div>
	</div>
</div>
<div class="row main" style="display:none">
	<div class="closeSession">
		<a onClick="logout()">
			<i class="fas fa-power-off"></i>
		</a>
	</div>
<div class=" side-bar col-lg-2 col-md-2 col-sm-2"  >
  <img class="logo margin-left-5 center-block" src="<?php echo asset("storage/img/logo.png")?>" id="icon" alt="User Icon" style="width:180px" />
	<ul>
		<li>
			<a href="/admin/viewListProyectos/null" target="iframe">
				Proyectos
			</a>
		</li>
		<li>
			<a href="/admin/viewListTestimonios/null" target="iframe">
				Testimonios
			</a>
		</li>
		<li>
			<a href="/admin/viewListNovedades/null" target="iframe">
				Novedades
			</a>
		</li>
	</ul>
</div>
<div class="pageContent float-left col-lg-10 col-md-10 col-sm-10" >
	  <iframe src="" id="iframe" class="float-left" name="iframe" target="iframe" frameborder="0"></iframe>
</div>
</div>
@stop