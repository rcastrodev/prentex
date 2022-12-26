@extends('adminlte::page')
@section('title', 'crear producto')
@section('content')
@include('administrator.partials.mensaje-error')
<form action="{{ route('product.content.store') }}" method="POST" enctype="multipart/form-data" class="row mb-5">
    @csrf
    <div class="col-sm-12 col-md-3">
        <div class="form-group">
            <label for="">Código</label>
            <input type="text" name="code" value="{{ old('code') }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="form-group">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{ old('order') }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label for="">Categoría</label>
            <select name="category_id" id="category_id" class="form-control select2">
                <option value="0" selected disabled>Selecciona</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (old('category_id') == $category->id) {{ 'selected' }} @endif
                        >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label for="">Subcategoría</label>
            <select name="sub_category_id" id="sub_category_id" class="form-control">
                <option value="0" selected disabled>Selecciona</option>
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label for="">Marca</label>
            <select name="brand_id" class="form-control select2">
                <option value="0" selected disabled>Selecciona</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @if (old('brand_id') == $brand->id) {{ 'selected' }} @endif>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="">Riesgos</label>
            <select name="tags_id[]" class="form-control select2" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <small>la imagen card debe ser al menos 600x450px</small>
            <input type="file" name="image" class="form-control-input">
        </div>
    </div>
    <div class="col-sm-12">
        <label for="">Descripción</label>
        <textarea name="description" class="ckeditor" cols="30" rows="10">{{ old('description') }}</textarea>
    </div>
    <div class="col-sm-12 mt-3">
        <button class="btn btn-primary w-100">Guardar</button>
    </div>
</form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <meta name="urlgetsubcategories" content="{{ route('product.get-sub-categories') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script>$('.select2').select2()</script>
    <script>
        if ($("#category_id").select2('val')) {
            axios.get(`${$('meta[name="urlgetsubcategories"]').attr('content')}/${$("#category_id").select2('val')}`)
            .then(function (response) {
                let option
                if (Object.entries(response.data).length) {
                    Object.entries(response.data).forEach(element => {
                        option += `<option value="${element[1]}"">${element[0]}</option>`
                    });
                    $('#sub_category_id').html(option)  
                }else{
                    $('#sub_category_id').html('<option value="0">Selecciona</option>')  
                }
            })
            .catch(function (error) {
                console.log(error);
            })
        }

        $('#category_id').change(function(){
            axios.get(`${$('meta[name="urlgetsubcategories"]').attr('content')}/${$(this).val()}`)
            .then(function (response) {
                let option
                if (Object.entries(response.data).length) {
                    Object.entries(response.data).forEach(element => {
                        option += `<option value="${element[1]}"">${element[0]}</option>`
                    });
                    $('#sub_category_id').html(option)  
                }else{
                    $('#sub_category_id').html('<option value="0">Selecciona</option>')  
                }
            })
            .catch(function (error) {
                console.log(error);
            })
        });
    </script>
@stop