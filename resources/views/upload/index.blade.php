<form action="/upload" method="post">
    @csrf
    <input type="file" name="avatar" enctype="multipart/form-data">
    <br>
    <input type="submit" value="保存">
</form>