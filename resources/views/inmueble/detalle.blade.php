<div class="row justify-content-center al_100 color_morado_back">
	<div class="col-11 col-sm-7 display_inline">
		<div id="slides">
			@foreach($inmueble->ima as $galeria)
				<img class="al_100"  src="{{asset($galeria->imagen)}}" alt="">
			@endforeach
		</div>
	</div>
	<div class="col-11 col-sm-4 display_inline">
		<div class="row blanco">
			<div class="col-12">
				<h4 class='texto_bold'>{{$inmueble->nombre}}</h4>
			</div>
			<div class="col-12">
				{{$inmueble->precio}}
			</div>
			<div class="col-12 blanco descripciones">
				{!!$inmueble->descripcion!!}
			</div>
		</div>
	</div>
</div>

<script src="http://www.slidesjs.com/js/jquery.slides.min.js"></script>
<script>
$(function(){
  $("#slides").slidesjs({
	navigation: false,
	play: false,

  });
});
</script>
