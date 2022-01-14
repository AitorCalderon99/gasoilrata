@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="d-flex align-items-center justify-content-center list-unstyled fs-2 text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
