<a href="{{ route('productos', ['brand'=> $brand->id]) }}" class="card-brand bg-light d-flex align-items-center justify-content-center mb-4 text-decoration-none" style="height: 225px; text-align: center;">
    <div>
        @if (Storage::disk('public')->exists($brand->image))
            <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="img-fluid d-block mx-auto" style="max-height: 40px;">
        @else
            <img src="images/healthicons.svg" alt="{{ $brand->name }}" class="img-fluid d-block mx-auto" style="max-height: 40px;">
        @endif
    </div>
</a>