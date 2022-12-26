@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
    </div>
@stop
@section('content')
@if ($errors->any())
    @include('administrator.partials.mensaje-error')
@endif
@includeIf('administrator.partials.mensaje-exitoso')
@isset($section1)
    <section>
        <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section1->id}}">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section1->content_1}}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" cols="30" rows="10" class="ckeditor">{{$section1->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    @if (Storage::disk('public')->exists($section1->image))
                        <img src="{{Storage::disk('public')->url($section1->image)}}" class="img-fluid d-block mb-3">
                    @endif
                    <small>la imagen debe ser al menos 600x504</small>
                    <input type="file" name="image" class="form-control-input">
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex align-items-center">
            <h2 class="mr-2 mb-0">Linea de tiempo</h2>
            <button type="button" class="btn btn-sm btn-primary mb" data-toggle="modal" data-target="#modal-create-element">crear</button>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex align-items-center">
            <h2 class="mr-2 mb-0">Direcciones</h2>
            <button type="button" class="btn btn-sm btn-primary mb" data-toggle="modal" data-target="#modal-create-2">crear</button>
        </div>
        <table id="page_table_2" class="table">
            <thead>
                <tr>
                    <th>Ordén</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <section>
        <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    @if (Storage::disk('public')->exists($section2->image))
                        <img src="{{Storage::disk('public')->url($section2->image)}}" class="img-fluid d-block mb-3">
                    @endif
                    <small>la imagen debe ser al menos 600x420</small>
                    <input type="file" name="image" class="form-control-input">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section2->content_1}}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" cols="30" rows="10" class="ckeditor">{{$section2->content_2}}</textarea>
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@includeIf('administrator.company.modals2.create')
@includeIf('administrator.company.modals2.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

