@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
			@foreach ($sliders as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: url({{$slider->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
					<div class="container mx-auto contentHero">
						<div class="mt-sm-2 text-start" style="max-width: 600px;">
							<h1 class="font-size-60 text-white hero-content-slider" style="font-weight: 800;">{{ $slider->content_1 }}</h1>
						</div>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($section2s)
	@if(count($section2s))
		<div class="section2">
			@if (count($section2s->where('content_2', 1)))
				<div class="py-3 bg-light2">
					<div class="container mx-auto">
						<div class=" d-flex justify-content-between">
							@foreach ($section2s->where('content_2', 1) as $s2c1)
								<img src="{{ asset($s2c1->image) }}" alt="{{$s2c1->content_1}}" class="img-fluid d-block" style="width:80px; height:70px;">
							@endforeach
						</div>
					</div>
				</div>		
			@endif
			@if (count($section2s->where('content_2', 2)))
				<div class="py-3" style="border-bottom: 2px solid #E8E8E8;">
					<div class="container mx-auto">
						<div class=" d-flex justify-content-between">
							@foreach ($section2s->where('content_2', 2) as $s2c2)
								<img src="{{ asset($s2c2->image) }}" alt="{{$s2c2->content_1}}" class="img-fluid d-block" style="width:80px; height:70px;">
							@endforeach
						</div>
					</div>
				</div>			
			@endif
		</div>
	@endif
@endisset
@isset($section3)
	<div class="text-center section3">
		<h2 class="fw-600">{{ $section3->content_1 }}</h2>
	</div>
@endisset
@isset($categories)
	@if (count($categories))
		<div class="row container mx-auto mt-sm-5 mb-sm-3 my-md-5">
			<div class="col-sm 12-col-md-8">
				<h3 class="text-dark fw-600 font-size-32">Buscar por tipo de Productos</h3>
			</div>
			<div class="col-sm-12 col-md-4 text-end d-sm-none d-xl-block">
				@includeIf('paginas.partials.form-product')
			</div>
		</div>
		<div class="row container mx-auto mb-5">
			@foreach ($categories as $c)
				<div class="col-sm-12 col-md-6 col-xl-4 mb-5">
					@includeIf('paginas.partials.categoria', ['c' => $c])
				</div>
			@endforeach		
		</div>
	@endif
@endisset
@isset($tags)
	@if (count($tags))
		<div class="tags bg-red">
			<div class="container mx-auto py-5">
				<h2 class="text-white mb-5 font-size-28 fw-bold">Buscar por tipo de Riesgo</h2>
				<div class="d-flex flex-wrap">
					@foreach ($tags as $tag)
						@includeIf('paginas.partials.riesgo', ['tag' => $tag])
					@endforeach
				</div>
			</div>
		</div>	
	@endif
@endisset
@isset($brands)
	@if (count($brands))
		<div class="brands">
			<div class="container mx-auto py-5">
				<h2 class="mb-5 font-size-28 fw-600">Buscar por marca</h2>
				<div class="d-flex flex-wrap">
					@foreach ($brands as $brand)
						@includeIf('paginas.partials.marca', ['brand' => $brand])
					@endforeach
				</div>
			</div>
		</div>	
	@endif
@endisset
@isset($section4)
	<section id="section4" class="" style="background-image: url({{ asset($section4->image) }}); min-height:771px; background-repeat: no-repeat;
		background-size: cover;">
		<div class="container d-flex justify-content-end mt-5 text-white fw-600 font-size-60">
			<div class="">{!! $section4->content_1 !!}</div>
		</div>
	</section>
@endisset
@isset($section5s)
	@if (count($section5s))
		<div id="section5s" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="container mx-auto position-relative">
					<div class="button-slider">
						<button class="carousel-control-prev" type="button" data-bs-target="#sliders4" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#sliders4" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
				@foreach ($section5s as $ks4 => $s4)
					<div class="carousel-item @if(!$ks4) active @endif" style="background-image: url({{ asset($s4->image) }}); height: 1420px;
						background-position: center; background-repeat: no-repeat;">
						<div class="container mx-auto">
							<div class="carousel-caption d-block" style="position: static !important; margin-top: 100px;">
								<div class="">{!! $s4->content_1 !!}</div>
							</div>
						</div>
					</div>		
				@endforeach
			</div>
		</div>
	@endif
@endisset
@endsection
@push('head')
	<style>
		.section3 {
			border-bottom: 2px solid #E8E8E8;
		}
		.section3 h2{
			padding: 60px 0;
		}

		#section4 div div{
			width: 700px;
			line-height: 60px;
			margin-top: 90px;
		}

		#section5s .carousel-caption{
			top: 10% !important;
			color: black;
			max-width: 460px;
			text-align: left;
			margin-left: 50px;
			margin-right: auto;
		}
		#section5s .carousel-control-next-icon{
			background-image: url({{ asset('images/right.svg') }});
		}
		#section5s .carousel-control-prev-icon{
			background-image: url({{ asset('images/left.svg') }});
		}
		.button-slider{
			position: absolute;
			z-index: 100;
			top: 100px;
			right: 20px;
			display: flex;
			width: 60px;
			justify-content: space-around;
			height: 60px;
		}
		.button-slider button{
			position: static !important
		}
		#section5s .carousel-control-prev, #section5s .carousel-control-next{

		}
	</style>
@endpush

