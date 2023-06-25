@props(['route'])
{{-- {{ dd($route) }} --}}
<a href="{{ route($route) }}" class="btn btn-primary btn-lg add-button mt-3">{{ $slot }}</a>
