@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['titulo' => 'CALIDAD'])
@isset($section1)
	<section id="section1" class="py-sm-2 pt-md-5">
		<div class="container py-sm-0 py-md-3">
			<div class="row justify-content-between">
				<div class="col-sm-12 col-md-5">
					<h3 class="font-size-28 fw-bold mb-sm-3 mb-md-5">{{$section1->content_1}}</h3>
					<div class="fw-light font-size-16" style="line-height: 27px;">{!! $section1->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0">
					@if (Storage::disk('public')->exists($section1->image))
						<img src="{{ asset($section1->image) }}" class="img-fluid" style="object-fit: contain;">
					@endif
				</div>
				@if (Storage::disk('public')->exists($section1->image2))
					<div class="col-sm-12 mt-5">
						<img src="{{ asset($section1->image2) }}" class="img-fluid w-100" style="object-fit: contain;">
					</div>
				@endif
			</div>
		</div>
	</section>	
@endisset
@isset($section2s)
	@if (count($section2s))
		<div id="section2" class="my-5">
			<div class="container  mx-auto">
				<div class="row mb-4">
					<div class="col-sm 12-col-md-8">
						<h3 class="text-dark fw-bold font-size-32">Descargas</h3>
					</div>
					<div class="col-sm-12 col-md-4 text-end d-sm-none d-xl-block">
						@includeIf('paginas.partials.form-product')
					</div>
				</div>
				<div class="row">
					@foreach ($section2s as $s2)
						@if(Storage::disk('public')->exists($s2->image))
							<div class="col-sm-12 col-md-4 mb-4">
								<a href="{{ route('descargar-archivo', ['id'=> $s2->id, 'reg' => 'image']) }}" class="d-flex justify-content-between align-items-center py-2 px-4 bg-light text-decoration-none text-dark">
									<strong>{{ $s2->content_1 }}</strong>
									<img src="{{ asset('images/descargas.svg') }}"></a>
								</a>
							</div>	
						@endif	
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endisset
@endsection
@push('head')
	<style>
	</style>
@endpush
@push('scripts')
@endpush
