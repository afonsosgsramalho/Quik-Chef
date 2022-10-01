<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleFormControlFile1">Insert Avatar Image</label>
        <input type="file" name="avatar" class="form-control-file" enctype="multipart/form-data">
        <button type="submit" name="avatarSubmit">Submit</button>
      </div>
    </form>
  </body>
</html>
