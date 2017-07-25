<form id="showMapForm" method="post" action="{{route('api-process-files')}}" enctype="multipart/form-data"
      onsubmit="return false">
    <div class="form-group">
        <label>(Add .csv file)</label>
        <input type="file" name="uploadFile" required>
    </div>
    <button type="submit" class="btn btn-default">Show map</button>
</form>
