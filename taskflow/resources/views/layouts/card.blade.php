<div class="col-md-4">
    <div class="card shadow-sm h-100">
        <div class="card-body text-center">

            @if(isset($title))
                <h5 class="card-title">{{ $title }}</h5>
            @endif

            @if(isset($text))
                <p class="card-text text-muted">{{ $text }}</p>
            @endif

            @if(isset($buttonText))
                <a href="{{ $link ?? '#' }}" class="btn btn-primary btn-sm">
                    {{ $buttonText }}
                </a>
            @endif

        </div>
    </div>
</div>