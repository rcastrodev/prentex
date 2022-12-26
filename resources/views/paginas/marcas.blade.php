@extends('paginas.partials.app')
@section('content')
    @includeIf('paginas.partials.jumbotron', ['titulo' => 'MARCAS'])
    @isset($brands)
        @if (count($brands))
            <div class="brands">
                <div class="container mx-auto py-5">
                    <div class="d-flex flex-wrap">
                        @foreach ($brands as $brand)
                            @includeIf('paginas.partials.marca', ['brand' => $brand])
                        @endforeach
                    </div>
                </div>
            </div>	
        @endif
    @endisset
@endsection
@push('head')
	<style>
	</style>
@endpush
@push('scripts')
@endpush
