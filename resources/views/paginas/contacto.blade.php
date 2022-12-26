@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['titulo' => 'CONTACTO'])
<div class="py-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-3 font-size-14">
                    <div class="font-size-16 fw-light mb-4">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</div> 
                    @foreach ($address as $addss)
                        <div class="mb-4">
                            <h6 class="font-size-14 fw-bold mb-4 text-red text-uppercase">PRENTEX{{ $addss->content_1 }}</h6>
                            @if ($addss->content_2)
                                <div class="d-flex mb-3 align-items-start">
                                    <i class="fas fa-map-marker-alt text-red d-block me-3"></i>
                                    <address class="mb-0 font-size-16" style="line-height: 19px;">{{ $addss->content_2 }}</address>
                                </div>		
                            @endif
                            @if ($addss->content_3)
                                <div class="d-flex mb-3 align-items-start">
                                    <i class="fas fa-envelope text-red d-block me-3"></i>
                                    <a href="mailto:{{ $addss->content_3 }}" class="text-dark text-decoration-none underline mb-0 font-size-16"
                                        style="line-height: 14px;">{{ $addss->content_3 }}</a> 
                                </div>		
                            @endif
                            @if ($addss->content_4)
                                @php $phone = Str::of($addss->content_4)->explode('|') @endphp
                                <div class="d-flex mb-3 align-items-start">
                                    <i class="fas fa-phone-alt text-red d-block me-3"></i>
                                    @if(count($phone) == 2)
                                        <a href="tel:{{$phone[0]}}" class="text-dark text-decoration-none underline font-size-16" style="line-height: 14px;">{{ $phone[1] }}</a>
                                    @else
                                        <a href="tel:{{$addss->content_4}}" class="text-dark text-decoration-none underline font-size-16" style="line-height: 14px;">{{ $addss->content_4 }}</a>
                                    @endif
                                </div>	
                            @endif
                            @if ($addss->content_5)
                                <div class="d-flex align-items-center">
                                    <i class="fab fa-instagram text-red d-block me-3"></i>
                                    <a href="#" class="text-dark text-decoration-none underline mb-1 font-size-16">{{ $addss->content_5 }}</a> 
                                </div>		
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Nombre *</label>
                                <input type="text" name="nombre" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">apellido</label>
                                <input type="text" name="apellido" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Teléfono *</label>
                                <input type="tel" name="telefono" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Empresa</label>
                                <input type="text" name="compania" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="fw-bold d-block mb-2">Mensaje*</label>
                                <textarea name="mensaje" class="form-control font-size-14 input-fondo" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group pt-4">{!! app('captcha')->display() !!}</div>
                        </div>
                        <div class="col-sm-12  mb-sm-3 mb-sm-3 text-sm-center text-md-end">
                            <span class="me-3" style="color: #454545;">*Campos Obligatorios</span>
                            <button type="submit" class="btn bg-red font-size-14 py-2 mb-sm-3 mb-md-0 text-white px-5 rounded-pill">Enviar mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="my-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3407.958315753268!2d-64.33757828533484!3d-31.33252428143216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94329d898c07f01f%3A0x2c79749ca2cd3cce!2sCalle%20Cjal.%20Maruzich%2050%2C%20C%C3%B3rdoba%2C%20Argentina!5e0!3m2!1ses!2sve!4v1656188340452!5m2!1ses!2sve" height="464" style="border:0; width:100%;" allowfullscreen="" loading="lazy" style="max-width: 100%;"></iframe>
        </div>
    </div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')	
@endpush
       

