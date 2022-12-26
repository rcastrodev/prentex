@extends('adminlte::page')
@section('title', 'Riesgos')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Riesgos</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>  
@includeIf('administrator.tag.modals.create')
@includeIf('administrator.tag.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('tag.content')}}">
    <meta name="content_find" content="{{route('tag.content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/tag/index.js') }}"></script>
@stop

