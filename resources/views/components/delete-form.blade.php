@props(['route', 'value'])


<form class="m-0 p-0 d-inline" method="POST" action="{{ $route }}">
    @method('DELETE')
    @csrf
    @if ($value)
        <input type="hidden" name="delete_what" value="{{ $value }}">
    @endif
    <button class="m-0 p-0 delete" type="submit"><i class="bi bi-trash-fill"></i></button>
</form>
