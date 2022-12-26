<a href="{{ route('productos', ['tag'=> $tag->id]) }}" class="card-tag bg-light d-flex align-items-center justify-content-center mb-4 text-decoration-none" style="height: 225px; text-align: center;">
    <div>
        @if (Storage::disk('public')->exists($tag->image))
            <img src="{{ asset($tag->image) }}" alt="{{ $tag->name }}" class="img-fluid d-block mx-auto" style="max-height: 100px; min-height:100px;">
        @else
            <img src="images/healthicons.svg" alt="{{ $tag->name }}" class="img-fluid d-block mx-auto" style="max-height: 100px; min-height:100px;">
        @endif
        <div class="text-dark fw-bold">{{ $tag->name }}</div>
    </div>
</a>