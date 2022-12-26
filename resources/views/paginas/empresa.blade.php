@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['titulo' => 'NOSOTROS'])
@isset($section1)
	<section id="section1" class="py-sm-2 pt-md-5">
		<div class="container py-sm-0 py-md-3">
			<div class="row justify-content-between">
				<div class="col-sm-12 col-md-6">
					<h3 class="font-size-28 fw-bold mb-sm-3 mb-md-5">{{$section1->content_1}}</h3>
					<div class="fw-light font-size-16" style="line-height: 27px;">{!! $section1->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0">
					@if (Storage::disk('public')->exists($section1->image))
						<img src="{{ asset($section1->image) }}" class="img-fluid" style="object-fit: contain;">
					@endif
				</div>
			</div>
		</div>
	</section>	
@endisset
@isset($sections2s)
	@if (count($sections2s))
		<div class="bg-light py-5 d-sm-none d-xl-block">
			<div class="container mx-auto">
				<h2 class="mbr-5 font-size-28 fw-bold">Nuestra Historia</h2>
				<div class="timeline-container timeline-theme-1">
					<div class="timeline js-timeline">
					@foreach ($sections2s as $s2)
						<div data-time="{{$s2->content_1}}">
							<div class="">{!! $s2->content_2 !!}</div>
							@if (Storage::disk('public')->exists($s2->image))
								<img src="{{ asset($s2->image) }}">
							@endif
						</div>
					@endforeach
					</div>
				</div><!-- /.timeline-container -->
			</div>
		</div>
	@endif
@endisset
@isset($sections3s)
	@if (count($sections3s))
		<div class="py-5">
			<div class="container mx-auto">
				<h2 class="mb-5 font-size-28 fw-bold">Puntos de venta</h2>
				<div class="row">
					@foreach ($sections3s as $s2)
						<div class="col-sm-12 col-xl-4 mb-sm-3 mb-lg-0">
							<div class="bg-light p-3" style="min-height: 550px;">
								<div class="direccion mb-4" style="height: 232px;">{!! $s2->content_6 !!}</div>
								<h6 class="font-size-18 fw-bold mb-4">{{ $s2->content_1 }}</h6>
								@if ($s2->content_2)
									<div class="d-flex mb-3">
										<i class="fas fa-map-marker-alt text-red d-block me-3"></i>
										<address class="mb-0">{{ $s2->content_2 }}</address>
									</div>		
								@endif
								@if ($s2->content_3)
									<div class="d-flex mb-3">
										<i class="fas fa-envelope text-red d-block me-3"></i>
										<a href="mailto:{{ $s2->content_3 }}" class="text-dark text-decoration-none underline mb-0">{{ $s2->content_3 }}</a> 
									</div>		
								@endif
								@if ($s2->content_4)
									@php $phone = Str::of($s2->content_4)->explode('|') @endphp
									<div class="d-flex mb-3">
										<i class="fas fa-phone-alt text-red d-block me-3"></i>
										@if(count($phone) == 2)
											<a href="tel:{{$phone[0]}}" class="text-dark text-decoration-none underline">{{ $phone[1] }}</a>
										@else
											<a href="tel:{{$s2->content_4}}" class="text-dark text-decoration-none underline">{{ $s2->content_4 }}</a>
										@endif
									</div>	
								@endif
								@if ($s2->content_5)
									<div class="d-flex">
										<i class="fab fa-instagram text-red d-block me-3"></i>
										<a href="#" class="text-dark text-decoration-none underline mb-1">{{ $s2->content_5 }}</a> 
									</div>		
								@endif
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endisset
@isset($sections4)
	<section id="sections4" class="py-sm-2 pt-md-5">
		<div class="container py-sm-0 py-md-3">
			<div class="row justify-content-between align-items-center">
				<div class="col-sm-12 col-lg-6 mb-sm-4 mb-md-0">
					@if (Storage::disk('public')->exists($sections4->image))
						<img src="{{ asset($sections4->image) }}" class="img-fluid" style="object-fit: contain;">
					@endif
				</div>
				<div class="col-sm-12 col-lg-5">
					<h3 class="font-size-28 fw-bold mb-sm-3 mb-md-5">{{$sections4->content_1}}</h3>
					<div class="fw-light font-size-16" style="line-height: 27px;">{!! $sections4->content_2 !!}</div>
				</div>
			</div>
		</div>
	</section>	
@endisset
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/timeline/timeline.css') }}">
	<style>
		.timeline-item{
			color: #131313;
		}
		.timeline-dots-wrap.bottom{
			top: -60px;
		}
		.timeline-horizontal .timeline-dots li{
			width: 100px;
		}
		.timeline-horizontal .timeline-dots button{
			background-color: red;
			border-radius: 10px;
			padding: 5px 10px;
		}
		.timeline-dots-wrap{
			overflow: visible
		}
		.mbr-5 {
			margin-bottom: 5rem !important;
		}
		.direccion iframe{
			height: 232px;
			width: 100%
		}
		iframe{
			max-width: 100%;
		}
		.timeline-dots-wrap .timeline-dots{
			transform: translate3d(0px, 0px, 0px) !important;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{ asset('vendor/timeline/timeline.js') }}"></script>
	<script>
		$(function(){
			$('.js-timeline').Timeline();
		});
	</script>
@endpush
