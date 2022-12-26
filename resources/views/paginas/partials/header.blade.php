<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light w-100 py-md-4 py-sm-1 bg-white">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ route('index') }}">
                <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header d-block me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav position-relative align-items-center justify-content-between">
                    <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                        <a class="nav-link font-size-16 text-dark inter @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Nosotros</a>
                    </li>
                    <li class="nav-item @if(Request::is('productos')) position-relative @endif">
                        <a class="nav-link font-size-16 text-dark inter @if(Request::is('productos')) active @endif" href="{{ route('productos') }}">Productos</a>
                    </li>
                    <li class="nav-item @if(Request::is('marcas')) position-relative @endif">
                        <a class="nav-link font-size-16 text-dark inter @if(Request::is('marcas')) active @endif" href="{{ route('marcas') }}">Marcas</a>
                    </li>
                    <li class="nav-item @if(Request::is('calidad')) position-relative @endif">
                        <a class="nav-link font-size-16 text-dark inter @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}" >Calidad</a>
                    </li> 
                    <li class="nav-item @if(Request::is('novedades') || Request::is('novedad/*')) position-relative @endif">
                        <a class="nav-link font-size-16 text-dark inter @if(Request::is('novedades') || Request::is('novedad/*')) active @endif" href="{{ route('novedades') }}" >Novedades</a>
                    </li>         
                    <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                        <a class="nav-link font-size-16 text-dark inter @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
</div>


