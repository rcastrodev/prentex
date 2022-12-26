@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
@if ($errors->any())
    @include('administrator.partials.mensaje-error')
@endif
@includeIf('administrator.partials.mensaje-exitoso')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Contenido destacado</th>
                    <th>Parrafo</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>  
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex mb-4">
            <h3 class="mr-2">Logos</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-2">Subir</button>
        </div>
        <table id="page_table_2" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>  
@isset($section3)
    <form action="{{ route('home.content.update-section') }}" method="post" data-sync="no" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" name="id" value="{{$section3->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-10">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section3->content_1}}" placeholder="Título" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary d-block w-100">Actualiar</button>
                </div>
            </div>
        </div>
    </form>
@endisset
@isset($section4)
    <form action="{{ route('home.content.update-section') }}" method="post" data-sync="no" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" name="id" value="{{$section4->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    @if (Storage::disk('public')->exists($section4->image))
                        <img src="{{Storage::disk('public')->url($section4->image)}}" class="img-fluid d-block mb-3">
                    @endif
                    <small>la imagen debe ser al menos 1366x771px</small>
                    <input type="file" name="image" class="form-control-input">
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="form-group">
                    <textarea name="content_1" class="ckeditor">{{$section4->content_1}}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Actualiar</button>
        </div>
    </form>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex mb-4">
            <h3 class="mr-2">Equipos</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-3">Subir</button>
        </div>
        <table id="page_table_3" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>  
@includeIf('administrator.home.modals.create')
@includeIf('administrator.home.modals.update')
@includeIf('administrator.home.modals2.create')
@includeIf('administrator.home.modals2.update')
@includeIf('administrator.home.modals3.create')
@includeIf('administrator.home.modals3.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

