@isset ($filename)
<div>
    <img src="{{ asset('storage/' . $filename) }}">
</div>
@endisset

<a href="/">登録に戻る</a>