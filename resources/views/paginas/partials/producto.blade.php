<a href="{{ route('producto', ['slug'=> $p->slug ]) }}" class="card producto text-decoration-none position-relative text-dark" style="height: 410px;">
    @if (Storage::disk('public')->exists($p->image))
        <img src="{{ asset($p->image) }}" class="img-fluid img-product" style="height: 216px; object-fit: cover;">
    @else
        <img src="{{ asset('images/defaultcategory.png') }}" class="img-fluid img-product" style="height: 216px; object-fit: cover;">
    @endif
    <div class="card-body">
        <div class="card-text">
            <p class="font-size-14 mb-2">{{$p->code}}</p>
            <p class=" mb-0 fw-bold font-size-18 text-red text-uppercase mb-2">{{ Str::limit($p->name, 40) }}</p>
            <div class="text-gray">{!! Str::limit($p->description, 100) !!}</div>
        </div>
    </div>
</a>
