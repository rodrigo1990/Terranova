@extends('layouts.main')

@section('main')
@include('inc.header')

<section id="testimonios">
	<h2 class="title primary-color text-center"><b>TESTIMONIOS</b></h2>
			<div class="row">
				<div class="container">	
				<ul class="flex">
					
				</ul>	
				 	 
				<div id="pagination-demo"></div>
				</div>
			</div>
</section>
@include('inc.contacto')
@include('inc.footer')
@stop
@section('scripts')
<script>
	$(document).ready(function(){

		//$(".btn").grtyoutube();

		videoLightning({
			settings: {
				autoplay: true,
				bdColor: "#3A0372",
          bdOpacity: 0.8,
          glow: 50,
          glowColor: "#F1D6F5",
          color: "#fff",
				 color: "white"
				}, element: ".video-link"});

	});
</script>

<script>
	$("#testimonios").css('margin-top',$('header').height()+90);
</script>

<script>

	window.testimonios = <?php echo $testimonios  ?>;


</script>
@stop