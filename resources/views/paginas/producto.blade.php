@extends('paginas.partials.app')
@section('content')
    <div id="producto" class="container mx-auto ">
        <div aria-label="breadcrumb" class="mb-5">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                  <a href="{{ route('index') }}" class="text-decoration-none text-gray">Inicio</a>
                </li>
              <li class="breadcrumb-item">
                  <a href="{{ route('productos') }}" class="text-decoration-none text-gray">Productos</a>
                </li>
              <li class="breadcrumb-item">
                  <a href="{{ route('categoria', ['slug' => $product->category->slug]) }}" class="text-decoration-none text-gray">{{$product->category->name}}</a>
                </li>
              <li class="breadcrumb-item">
                  <a href="{{ route('subCategoria', ['slug' => $product->subCategory->slug]) }}" class="text-decoration-none text-gray">{{$product->subCategory->name}}</a>
                </li>
              <li class="breadcrumb-item active" aria-current="page" class="text-gray">Data</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="mb-4 font-size-18">Cod: {{ $product->code }}</div>
                <h1 class="text-red mb-3 font-size-32">{{ $product->name }}</h1>
                <div class="fw-bold mb-3 font-size-18">DESCRIPCIÓN</div>
                <div class="font-size-16 mb-5">{!! $product->description !!}</div>
                <a href="{{ route('contacto') }}" class="d-block bg-red text-white text-center py-1 rounded-pill text-decoration-none" style="max-width:395px;">Consultar</a>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="">
                    @if (Storage::disk('public')->exists($product->image))
                        <img src="{{ asset($product->image) }}" class="img-fluid w-100" style="height: 450px;" id="imagenactual">
                    @else
                        <img src="{{ asset('images/defaultcategory.png') }}" class="img-fluid w-100" style="height: 450px;" id="imagenactual">
                    @endif
                </div>
                <div class="">
                    <ul class="p-0 mt-3 d-flex" style="list-style: none;">
                        @foreach ($product->images as $im)
                            <li class="me-2" style="width: 80px; height:60px;">
                                <img src="{{ asset($im->image) }}" class="img-fluid imagen-list" style="width: 80px; height:60px; object-fit: cover; cursor:pointer;">
                            </li> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @if (count($product->attributes))
            <div class="row mt-5">
                <div class="col-sm-12 mb-4"><h2 class="fw-bold text-uppercase font-size-18">Caracteristicas</h2></div>
                @foreach ($product->attributes()->orderBy('order', 'ASC')->get() as $pa)
                    <div class="col-sm-12 col-md-4 font-size-16 mb-4">
                        <div class="py-2" style="border-bottom: 1px solid #E0E0E0;">
                            <strong class="me-2">{{ $pa->name }}</strong>
                            <span>{{ $pa->description }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if (count($product->images()->where('section', 'download')->orderBy('order', 'ASC')->get()))
            <div class="row mt-5">
                <div class="col-sm-12 mb-4"><h2 class="fw-bold text-uppercase font-size-18">DESCARGAS</h2></div>
                @foreach ($product->images()->where('section', 'download')->orderBy('order', 'ASC')->get() as $don)
                    <div class="col-sm-12 col-md-4 font-size-16 mb-4">
                        <a href="#" class="bg-light d-flex justify-content-between text-dark text-decoration-none p-3" style="border-bottom: 1px solid #E0E0E0; border-radius:5px;">
                            <strong class="me-2">{{ $don->name }}</strong>
                            <img src="{{ asset('images/descargas.svg') }}" class="img-fluid">
                        </a>
                    </div>
                @endforeach
            </div>
        @endif   
        @if (count($product->subCategory->products))
        <div class="row mt-5">
            <div class="col-sm-12 mb-4"><h2 class="fw-bold text-uppercase font-size-18">PRODUCTOS RELACIONADOS</h2></div>
            @foreach ($product->subCategory->products()->orderBy('order', 'ASC')->get() as $kpr => $pr)
                @if($pr->id == $product->id) @continue @endif
                <div class="col-sm-12 col-md-4 font-size-16 mb-4">
                    @includeIf('paginas.partials.producto', ['p' => $pr])	
                </div>
                @if ($kpr == 3) @break @endif
            @endforeach
        </div>         
        @endif
    
    </div>
@endsection
@push('head')
	<style>
        #producto{
            margin: 150px 0;
        }
	</style>
@endpush
@push('scripts')
    <script>
        $('.imagen-list').click(function(e){
            let img = e.target
            $('#imagenactual').attr('src', img.getAttribute('src'))
        })
    </script>
@endpush
