<!DOCTYPE html>
<html>
<head>
   <title>Upload File</title>
   <!-- Add Bootstrap CSS link here -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
   <div class="container mt-5">
      <form action="{{ url('/uploadfile') }}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="image">Select the file to upload</label>
            <input type="file" class="form-control-file" id="image" name="image">
         </div>
         <button type="submit" class="btn btn-primary">Upload File</button>
      </form>
   </div>
</body>
</html>