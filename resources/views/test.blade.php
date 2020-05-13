@isset ($filename)
<div>
    <img src="{{ asset('storage/' . $filename) }}">
</div>
@endisset