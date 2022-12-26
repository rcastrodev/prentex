@extends('adminlte::page')
@section('title', 'Editar Producto')
@section('content')
@include('administrator.partials.mensaje-error')
<form action="{{ route('product.content.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="row mb-5" data-sync="no">
    @csrf
    <div class="col-sm-12 col-md-3">
        <div class="form-group">
            <label for="">Código</label>
            <input type="text" name="code" value="{{ $product->code }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="form-group">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{ $product->order }}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label for="">Categoría</label>
            <select name="category_id" id="category_id" class="form-control select2">
                <option value="0" selected disabled>Selecciona</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($product->category_id == $category->id) {{ 'selected' }} @endif
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
                    <option value="{{ $brand->id }}" @if($product->brand_id == $brand->id) {{ 'selected' }} @endif>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="">Riesgos</label>
            <select name="tags_id[]" class="form-control select2" multiple="multiple">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @if(in_array($tag->id, $product->tags->pluck('id')->toArray(), true)) {{'selected'}} @endif>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="form-group">
            <div class="position-relative">
                @if (Storage::disk('public')->exists($product->image))
                    <img src="{{Storage::disk('public')->url($product->image)}}" class="img-fluid d-block mb-3 w-100">
                    <button data-url="{{ route('product.card-image.destroy', ['id'=> $product->id]) }}" id="imgcard" class="btn btn-danger far fa-trash-alt position-absolute rounded-pill" style="top: -15px; right: -20px;"></button>
                @endif
            </div>
            <small>la imagen card debe ser al menos 600x450px</small>
            <input type="file" name="image" class="form-control-input">
        </div>
    </div>
    <div class="col-sm-12">
        <label for="">Descripción</label>
        <textarea name="description" class="ckeditor" cols="30" rows="10">{!! $product->description !!}</textarea>
    </div>
    <div class="col-sm-12 mt-3">
        <button class="btn btn-primary w-100">Guardar</button>
    </div>
</form>
<div class="row pb-5" id="imagenes">
    <div class="col-sm-12">
        <div class="d-flex mb-3">
            <h3 class="mr-3">Imágenes</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">Subir</button>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="row pb-5">
    <div class="col-sm-12">
        <div class="d-flex mb-3">
            <h3 class="mr-3">Características</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-2">Subir</button>
        </div>
        <table id="page_table_2" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="row pb-5">
    <div class="col-sm-12">
        <div class="d-flex mb-3">
            <h3 class="mr-3">Descargas</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-3">Subir</button>
        </div>
        <table id="page_table_3" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.products.images.create')
@includeIf('administrator.products.images.update') 
@includeIf('administrator.products.modals2.create')
@includeIf('administrator.products.modals2.update') 
@includeIf('administrator.products.modals3.create')
@includeIf('administrator.products.modals3.update') 
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <meta name="root" content="{{route('product.content')}}">
    <meta name="url" content="{{route('product.slider.get-images', ['id' => $product->id])}}">
    <meta name="urlgetsubcategories" content="{{ route('product.get-sub-categories') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script>$('.select2').select2()</script>
    <script>
        let table = $('#page_table_slider').DataTable({
            serverSide: true,
            ajax: `${$('meta[name="url"]').attr('content')}`,
            bSort: true,
            order: [],
            destroy: true,
            columns: [
                { data: "order" },
                { data: "image" },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            }, 
        });

        async function findContentImageProduct(id)
        {
            // get content 
            let url = `${document.querySelector('meta[name="root"]').getAttribute('content')}/image-product`
            if(url){
                if(id){
                    try {
                        let result = await axios.get(`${url}/${id}`)
                        let content = result.data.content 
                        dataImageProduct(content)
                    } catch (error) {
                        console.log(new Error(error));
                    }
                }
            }
        }

        function dataImageProduct(content)
        {
            let form = document.getElementById('form-update-slider')
            form.reset()
            form.querySelector('input[name="id"]').setAttribute('value', content.id)
            form.querySelector('input[name="order"]').setAttribute('value', content.order)
            form.querySelector('input[name="name"]').setAttribute('value', content.name)
        }

        function modalDestroyImageProduct(id)
        {
            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    elementDestroyImageProduct(id)
                }
            })
        }

        function elementDestroyImageProduct(id)
        {
            axios.delete(`${$('meta[name="root"]').attr('content')}/image/${id}`).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )

                if(typeof table !== 'undefined')    
                    table.ajax.reload()
                
                if(typeof tableService !== 'undefined')    
                    tableService.ajax.reload()
                
            }).catch(error => console.error(error))

        }

    </script>

    <script>
        let table2 = $('#page_table_2').DataTable({
            serverSide: true,
            ajax: `${$('meta[name=root]').attr('content')}/get-list2/{{$product->id}}`,
            bSort: true,
            order: [],
            destroy: true,
            columns: [
                { data: "order" },
                { data: "name" },
                { data: "description"},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
            }, 
        });

        async function findContentProductAttribute(id)
        {
            // get content 
            let url = `${document.querySelector('meta[name="root"]').getAttribute('content')}/product-attribute`
            if(url){
                if(id){
                    try {
                        let result = await axios.get(`${url}/${id}`)
                        let content = result.data.content 
                        dataProductAttribute(content)
                    } catch (error) {
                        console.log(new Error(error));
                    }
                }
            }
        }

        function dataProductAttribute(content)
        {
            let form = document.getElementById('form-update-2')
            form.reset()
            form.querySelector('input[name="id"]').setAttribute('value', content.id)
            form.querySelector('input[name="order"]').setAttribute('value', content.order)
            form.querySelector('input[name="name"]').setAttribute('value', content.name)
            form.querySelector('input[name="description"]').setAttribute('value', content.description)
            
        }

        function modalDestroy2(id)
        {
            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    elementDestroy2(id)
                }
            })
        }

        function elementDestroy2(id)
        {
            axios.delete(`${$('meta[name="root"]').attr('content')}/product-attribute/${id}`).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )
                
                if(typeof table2 !== 'undefined')    
                    table2.ajax.reload()
                
            }).catch(error => console.error(error))

        }
    </script>

<script>
    let table3 = $('#page_table_3').DataTable({
        serverSide: true,
        ajax: `${$('meta[name=root]').attr('content')}/get-list3/{{$product->id}}`,
        bSort: true,
        order: [],
        destroy: true,
        columns: [
            { data: "order" },
            { data: "name" },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        }, 
    });

    async function findContent3(id)
    {
        // get content 
        let url = `${document.querySelector('meta[name="root"]').getAttribute('content')}/product-download`
        if(url){
            if(id){
                try {
                    let result = await axios.get(`${url}/${id}`)
                    let content = result.data.content 
                    data3(content)
                } catch (error) {
                    console.log(new Error(error));
                }
            }
        }
    }

    function data3(content)
    {
        let form = document.getElementById('form-update-3')
        form.reset()
        console.log(content);
        form.querySelector('input[name="id"]').setAttribute('value', content.id)
        form.querySelector('input[name="order"]').setAttribute('value', content.order)
        form.querySelector('input[name="name"]').setAttribute('value', content.name)
        
    }

    function modalDestroy3(id)
    {
        Swal.fire({
            title: 'Deseas eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                elementDestroy3(id)
            }
        })
    }

    function elementDestroy3(id)
    {
        axios.delete(`${$('meta[name="root"]').attr('content')}/product-download/${id}`).then(r => {
            Swal.fire(
                'Eliminado!',
                '',
                'success'
            )
            
            if(typeof table3 !== 'undefined')    
                table3.ajax.reload()
            
        }).catch(error => console.error(error))

    }
</script>
<script>
    $('#imgcard').click(function(e){
        e.preventDefault();
        let btn = e.target
        axios.delete(btn.dataset.url).then(r => {
            Swal.fire(
                'Eliminado!',
                '',
                'success'
            )    
            
            btn.closest('div').remove()
        }).catch(error => console.error(error))

    })
</script>
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