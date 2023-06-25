@if ($attributes['data-name'])
    <div class="alert alert-primary p-0 ps-2" role="alert">
        {!! explode('.', pathinfo($attributes['data-name'], PATHINFO_BASENAME))[0] !!}
    </div>
@endif
