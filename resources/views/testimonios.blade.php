@extends('layouts.main')

@section('main')
@include('inc.header')

<section id="testimonios">
			<div class="row">
				<div class="container">
					<ul class="flex">
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>

				</div>
			</div>
</section>

@include('inc.footer')
@stop
@section('scripts')
<script>
	$("#testimonios").css('margin-top',$('header').height());
</script>
@stop