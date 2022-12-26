@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['titulo' => 'PRODUCTOS'])	
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
		</div>
	@endif
@endisset
<div id="app" class="my-5">
    <products-component></products-component>
</div>
@endsection
@push('head')
<link href="{{asset('css/app.css')}}" rel="stylesheet">
@endpush
@push('scripts')
<script src="{{asset('js/app.js')}}"></script>
@endpush

       
