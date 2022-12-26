<a href="{{ route('productos', ['category'=> $c->id ]) }}" class="card categoria text-decoration-none position-relative" style="height: 560px;">
    <div class="capa position-absolute d-none justify-content-center align-items-center" style="top:0; left:0; right:0; min-height: 490px">
        <strong class="d-inline-block text-white py-2 px-3 text-uppercase" style="border: 1px solid white;">ver más</strong>
    </div>
    @if ($c->image)
        <img src="{{ asset($c->image) }}" class="img-fluid img-product" style="min-height: 490px; max-height:490px; object-fit: cover;">
    @else
        <img src="{{ asset('images/defaultcategory.png') }}" class="img-fluid img-product" style="min-height: 490px; max-height:490px; object-fit: cover;">
    @endif
    <div class="card-body bg-red">
        <p class="card-text text-center mb-0 fw-bold font-size-24 text-white text-uppercase">{{ Str::limit($c->name, 40) }}</p>
    </div>
</a>