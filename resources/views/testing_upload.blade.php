<form  action="{{ route('settings.update')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="picture" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>
