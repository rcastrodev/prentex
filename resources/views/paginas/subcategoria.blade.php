@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('categorias') }}" class="text-decoration-none text-dark">Productos</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('categoria', ['id' => $subCategoria->category->id]) }}" class="text-decoration-none text-dark">{{ $subCategoria->category->name }}</a>
                </li>
                
                <li class="breadcrumb-item active text-dark" aria-current="page">{{ $subCategoria->name }}</li>
            </ol>
        </div>  
        <div class="py-5 row">
            <div class="col-sm-12 col-md-5 mb-4">
                <h1 class="text-red font-size-32">{{ $subCategoria->name }}</h1>
            </div>
        </div>
        <div class="row">
            
            @foreach ($subCategoria->images as $image)
                <div class="col-sm-12 col-md-3 mb-4">
                    <div class="card card2">
                        @if ($image->image)
                            <img src="{{ asset($image->image) }}" class="img-fluid img-product" style="min-height: 236px; max-height:236px; object-fit: contain;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="img-fluid img-product" style="min-height: 236px; max-height:236px; object-fit: contain;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title font-size-16">{{ Str::limit($image->name, 40) }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@push('head')
    <style>
        .breadcrumb-item + .breadcrumb-item::before{
            content:'/' !important;
        }

        .card.card1,
        .card img{
            border: 1px solid #E0E0E0 !important;
        }
    </style>
@endpush


       
