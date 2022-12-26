<footer class="font-size-14 text-sm-center text-md-start bg-gray">
    <div class="flex-sm-column flex-xl-row d-flex align-items-sm-center container mx-auto py-sm-2 py-md-5">
        <div class="addressfooter d-flex justify-content-sm-start justify-content-xl-between align-items-start wfooter-30 mb-sm-3 mb-xl-0" style="border-right: 2px solid #787878;">
            @if (Storage::disk('public')->exists($data->logo_footer))
                <div class="">
                    <img src="{{ asset($data->logo_footer) }}" class="d-block img-fluid">
                    <div class="d-flex flex-column mt-4">
                        @if ($data->facebook)
                            @php $facebook = Str::of($data->facebook)->explode('|') @endphp
                            @php $ig = Str::of($data->instagram)->explode('|') @endphp
                            @if (count($facebook) > 1)
                                <a href="{{$facebook[0]}}" class="d-block text-decoration-none underline text-white mb-2">
                                    <i class="fab fa-facebook me-3"></i>
                                    <span class="text-white font-size-16">{{$facebook[1]}}</span>
                                </a>      
                            @else
                                <a href="{{$data->facebook}}" class="d-block text-decoration-none underline text-white mb-2">
                                    <i class="fab fa-facebook me-3"></i>
                                    <span class="text-white font-size-16">{{$data->facebook}}</span>
                                </a>      
                            @endif
                            @if (count($ig) > 1)
                                <a href="{{$ig[0]}}" class="d-block text-decoration-none underline text-white mb-2">
                                    <i class="fab fa-instagram me-3"></i>
                                    <span class="text-white font-size-16">{{$ig[1]}}</span>
                                </a>      
                            @else
                                <a href="{{$data->instagram}}" class="d-block text-decoration-none underline text-white mb-2">
                                    <i class="fab fa-instagram me-3"></i>
                                    <span class="text-white font-size-16">{{$data->instagram}}</span>
                                </a>      
                            @endif
                        @endif
                    </div>
                </div>
            @endif
            <div class="d-block px-3">
                <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-white mb-1 underline font-size-16">Nosotros</a>
                <a href="{{ route('productos') }}" class="d-block text-decoration-none text-white mb-1 underline font-size-16">Productos</a>
                <a href="{{ route('marcas') }}" class="d-block text-decoration-none text-white mb-1 underline font-size-16">Marcas</a>
                <a href="{{ route('calidad') }}" class="d-block text-decoration-none text-white mb-1 underline font-size-16">Calidad</a>
                <a href="{{ route('novedades') }}" class="d-block text-decoration-none text-white mb-1 underline font-size-16">Novedades</a>
                <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-white mb-1 underline font-size-16">Contacto</a>
                <a href="#" class="d-block text-decoration-none text-white underline font-size-16">Trabaja en Prentex</a>
            </div>
        </div>
        <div class="font-size-16 px-3 wfooter-70 d-sm-none d-xl-flex flex-sm-column flex-xl-row justify-content-xl-between align-items-sm-start">
            @foreach ($address as $addss)
                <div class="wfooter-33 px-2 d-flex flex-column justify-content-between h-100 mb-sm-4 mb-xl-0 addressfooter" style="border-right: 2px solid #787878; min-height:215px;">
                    <div class="">
                        <strong class="mb-3 text-white d-block">{{ $addss->content_1 }}</strong>
                        <address class="text-white">{{ $addss->content_2 }}</address>
                    </div>
                    <div class="d-flex flex-column">
                        @if($addss->content_3)
                            <a href="mailto:{{ $addss->content_3 }}" class="text-white text-decoration-none underline mb-1">{{ $addss->content_3 }}</a> 
                        @endif
                        @if($addss->content_4)
                            @php $phone = Str::of($addss->content_4)->explode('|') @endphp
                            @if(count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none underline mb-1">{{ $phone[1] }}</a>
                            @else
                                <a href="tel:{{$addss->content_4}}" class="text-white text-decoration-none underline mb-1">{{ $addss->content_4 }}</a>
                            @endif
                        @endif
                        @if($addss->content_5)
                            <a href="#" class="text-white text-decoration-none underline mb-1">{{ $addss->content_5 }}</a> 
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</footer>
<div class="text-white bg-black py-2">
    <div class="container d-flex justify-content-between">
        <span class="text-white font-size-16">Todos los derechos reservados por Prentex S.A</span>
        <a href="https://osole.com.ar/" class="text-white text-decoration-none underline font-size-16">BY OSOLE</a>
    </div>
</div>
@if($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>
@endif
