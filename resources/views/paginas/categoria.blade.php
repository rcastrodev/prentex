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
<div id="productos" class="my-5">
    <div class="container mx-auto row">
        <div class="col-sm-12 col-md-3">
            <div class="">
                <form action="">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Ingresa tu busqueda" aria-label="Ingresa tu busqueda">
						<button class="btn bg-red"><i class="fal fa-search text-white"></i></button>
					</div>
				</form>
            </div>
            <div class="fw-bold font-size-18 py-3" style="border-bottom: 1px solid #E0E0E0;">Filtrar por</div>
            <div class="py-3 contenedor font-size-14" style="border-bottom: 1px solid #E0E0E0;">
                <div class="categoria text-gray position-relative mb-3">
                    CATEGORÍA
                    <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                        <i class="fal fa-angle-down"></i>
                    </div>
                </div>
                <div class="contenido">
                    <ul class="p-0" style="list-style: none">
                        @foreach ($categories as $c)
                            <li>
                                <a href="{{ route('categoria', ['slug'=>$c->slug]) }}" class="text-decoration-none py-1 d-block font-size-14 @if($c->id == $category->id) text-red @else text-dark @endif">{{$c->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="py-3 contenedor font-size-14" style="border-bottom: 1px solid #E0E0E0;">
                <div class="categoria text-gray position-relative mb-3">
                    MARCAS
                    <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                        <i class="fal fa-angle-down"></i>
                    </div>
                </div>
                <div class="contenido">
                    <ul class="p-0" style="list-style: none">
                        @foreach ($brands as $brand)
                            <li>
                                <label for="{{$brand->name}}{{$brand->id}}">
                                    <input type="checkbox" name="brand" value="{{$brand->id}}" id="{{$brand->name}}{{$brand->id}}" data-brand="{{$brand->name}}" class="me-2">
                                    {{$brand->name}}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="py-3 contenedor font-size-14" style="border-bottom: 1px solid #E0E0E0;">
                <div class="categoria text-gray position-relative mb-3">
                    RIESGO
                    <div class="position-absolute" style="right: 10px; top: -6px; font-size: 20px; cursor:pointer">
                        <i class="fal fa-angle-down"></i>
                    </div>
                </div>
                <div class="contenido">
                    <ul class="p-0" style="list-style: none">
                        @foreach ($tags as $tag)
                            <li>
                                <label for="{{$tag->name}}{{$tag->id}}">
                                    <input type="checkbox" name="tag" value="{{$tag->id}}" id="{{$tag->name}}{{$tag->id}}" data-tag="{{$tag->name}}" class="me-2">
                                    {{$tag->name}}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-9 row">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                    @includeIf('paginas.partials.producto', ['p' => $product])	
                </div>
            @endforeach
            <div class="col-sm-12">{{ $products->links() }}</div>
        </div>
    </div>
</div>
@endsection
@push('head')
@endpush

       
