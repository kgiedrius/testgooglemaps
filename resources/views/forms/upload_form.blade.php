<form id="geoDataProcessForm" method="post" action="{{route('api-process-files')}}" enctype="multipart/form-data"
      onsubmit="return false">
    <div class="form-group">
        <label>File (.json or .csv)</label>
        <input type="file" name="uploadFile" required>
    </div>
    <button type="submit" class="btn btn-default">Upload</button>
</form>
