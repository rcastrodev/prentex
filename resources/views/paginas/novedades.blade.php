@extends('paginas.partials.app')
@section('content')
    @includeIf('paginas.partials.jumbotron', ['titulo' => 'NOVEDADES'])
    <div class="py-5 container">
        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
            <button class="nav-link active" id="todas-tab" data-bs-toggle="tab" data-bs-target="#todas" type="button" role="tab" aria-controls="todas" aria-selected="true">Todas</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab" aria-controls="productos" aria-selected="false">Productos</button>
            </li>
            <li class="nav-item" role="presentation">
            <button class="nav-link" id="eventos-tab" data-bs-toggle="tab" data-bs-target="#eventos" type="button" role="tab" aria-controls="eventos" aria-selected="false">Eventos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="responsabilidadsocial-tab" data-bs-toggle="tab" data-bs-target="#responsabilidadsocial" type="button" role="tab" aria-controls="responsabilidadsocial" aria-selected="false">Responsabilidad Social</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="todas" role="tabpanel" aria-labelledby="todas-tab">
                <div class="row mb-5">
                    @foreach ($news as $n)
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                            @includeIf('paginas.partials.novedad', ['e' => $n])
                        </div>			
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="productos-tab">
                <div class="row mb-5">
                    @foreach ($news->where('content_3', 'PRODUCTOS') as $e)
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                            @includeIf('paginas.partials.novedad', ['e' => $e])
                        </div>			
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
                <div class="row mb-5">
                    @foreach ($news->where('content_3', 'EVENTOS') as $ee)
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                            @includeIf('paginas.partials.novedad', ['e' => $ee])
                        </div>			
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="responsabilidadsocial" role="tabpanel" aria-labelledby="responsabilidadsocial-tab">
                <div class="row mb-5">
                    @foreach ($news->where('content_3', 'RESPONSABILIDAD SOCIAL') as $ee)
                        <div class="col-sm-12 col-md-6 col-xl-4 mb-4">
                            @includeIf('paginas.partials.novedad', ['e' => $ee])
                        </div>			
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push('head')
    <style>
        .nav-tabs .nav-link{
            background: transparent !important;
            color: #848484 !important;
        }
        .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus{
            border: none;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            font-weight: bold;
            border-bottom: 2px solid #ED1C24 !important;
            color: #000000 !important;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
            border: none;
        }
        .nav-tabs{
            border-bottom: none !important;
        }
        .nav-tabs .nav-link {
            border-top-left-radius: 0 !important; 
            border-top-right-radius: 0 !important;
        }
    </style>
@endpush
@push('scripts')	
@endpush

       
