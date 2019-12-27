
@extends('layouts.main')

@section('main')
@include('inc.header')
<section id="preguntasFrecuentes" class="">
<h2 class="title primary-color text-center"><b>PREGUNTAS FRECUENTES</b></h2>	
	<div class="row">
		<div class="col-sm-12">
     

          <div class="row bk-grey panel-cont">
          <div class="container">
            <div class="panel-group" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">


                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq19">
                     01. ¿Puedo pagar en cuotas fijas?
                    </a>
                     <span class="change_char">-</span>
                  </h4>
                </div>
                <div id="faq19" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse convallis lacus a elit maximus viverra. Praesent sed augue vitae diam aliquet rutrum. Nam eu dolor dictum, scelerisque augue sit amet, aliquet augue. Praesent in ullamcorper nulla, eget luctus nibh. Ut nibh diam, eleifend hendrerit nibh ac, pulvinar blandit sem. Proin vel risus tellus. Proin euismod pulvinar diam et venenatis. Fusce porttitor felis eu lorem interdum hendrerit. Sed sapien massa, molestie in eleifend imperdiet, posuere eu massa. Aliquam eu enim blandit, vulputate justo ac, pellentesque est.</p>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq20">
                      
                      02. ¿En dónde estan ubicados los barrios?
                    </a>
                    <span class="change_char">+</span>
                  </h4>
                </div>
                <div id="faq20" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                    Quisque at risus id lacus tincidunt malesuada quis sit amet libero. Nullam consectetur varius massa nec mollis. Fusce feugiat accumsan nulla non convallis. Quisque mattis mollis quam in ullamcorper. Vestibulum sem velit, facilisis quis condimentum eget, blandit in orci. Phasellus id mauris lorem. Integer elementum aliquam libero, ac vulputate quam dapibus at.
                    </p>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq21">
                     
                      03. ¿Con qué servicios cuentan los proyectos?
                    </a>
                     <span class="change_char">+</span>
                  </h4>
                </div>
                <div id="faq21" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                    In massa diam, consectetur ac neque eget, ullamcorper cursus libero. Maecenas ac ultricies felis. Sed scelerisque augue sapien, sit amet iaculis justo ullamcorper quis. Proin tellus nulla, dapibus id condimentum ac, mollis non est. Ut non leo nisl. Aliquam lobortis arcu tellus, in tristique dui tristique eget. Vivamus condimentum pretium aliquet. Duis consequat feugiat finibus.
                    </p>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq22">
                     
                      04. ¿En dónde estan ubicados los barrios?
                    </a>
                     <span class="change_char">+</span>
                  </h4>
                </div>
                <div id="faq22" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                    Suspendisse eget urna gravida, semper enim ut, placerat ligula. Nunc vulputate laoreet odio, ut posuere magna suscipit eu. Vivamus efficitur massa nisi, nec hendrerit ante condimentum non. Duis eu arcu non diam elementum cursus ac eget augue. Phasellus ex ex, maximus sed quam sed, pretium consequat nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                    </p>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#faq23">
                      
                      05. ¿Con qué servicios cuentan los proyectos?
                    </a>
                    <span class="change_char">+</span>
                  </h4>
                </div>
                <div id="faq23" class="panel-collapse collapse">
                  <div class="panel-body">
                    <p>
                    In massa diam, consectetur ac neque eget, ullamcorper cursus libero. Maecenas ac ultricies felis. Sed scelerisque augue sapien, sit amet iaculis justo ullamcorper quis. Proin tellus nulla, dapibus id condimentum ac, mollis non est. Ut non leo nisl. Aliquam lobortis arcu tellus, in tristique dui tristique eget. Vivamus condimentum pretium aliquet. Duis consequat feugiat finibus.
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>

      </div>
		</div>
	</div>

	
</section>

	@include('inc.footer')
@stop
@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	$("#preguntasFrecuentes").css('margin-top',$('header').height()+90);
</script>

@stop