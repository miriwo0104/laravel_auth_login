<form action="/send" method="POST">
    @csrf
    <input type="text" name="email">
    <input type="submit">
</form>