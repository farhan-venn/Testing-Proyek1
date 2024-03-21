<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login SIPERLOH</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
  <![endif]-->
  <style>
    body {
      background-color: orange;
    }

    /* Set background color of koleksi section to black */
    .koleksi h2 {
      background-color: black;
      color: white;
      /* Set text color to white for better contrast */
      padding: 20px;
      /* Add padding for better spacing */
      width: 100%;
      /* Make the width 100% for responsiveness */
      text-align: center;
      /* Center the text */
    }

    /* Style the hr element */
    .koleksi hr {
      border-top: 1px solid white;
    }

    .koleksi p {
      background-color: pink;
      padding: 10px;
      /* Add padding for better spacing */
      border-radius: 5px;
      /* Add rounded corners */
      width: 100%;
      /* Make the width 100% for responsiveness */
      text-align: center;
      /* Center the text */
    }

    .koleksi .col-xs-12 {
      margin-bottom: 20px;
    }

    .koleksi img {
      max-width: 100%;
      height: auto;
      /* Make images responsive */
    }
  </style>
</head>

<body>
  <!------Navbar------->
  <nav class="navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img alt="Brand" src="images/5.jpg" width="50" height="50">
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php" class="page-scroll">Home</a></li>
          <li><a href="login.php">Admin</a></li>
          <li><a href="index.php" class="page-scroll">Tentang</a></li>
          <li><a href="index.php" class="page-scroll">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!------akhir---navbar---->
  <!-----koleksi--->
  <section class="koleksi">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h2>Koleksi Buku</h2>
          <hr>
        </div>
      </div>

      <div class="row">
        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["book_image"])) {
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["book_image"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

          // Check if image file is a actual image or fake image
          $check = getimagesize($_FILES["book_image"]["tmp_name"]);
          if ($check !== false) {
            $uploadOk = 1;
          } else {
            echo "<p>File is not an image.</p>";
            $uploadOk = 0;
          }

          // Check if file already exists
          if (file_exists($target_file)) {
            echo "<p>Sorry, file already exists.</p>";
            $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["book_image"]["size"] > 500000) {
            echo "<p>Sorry, your file is too large.</p>";
            $uploadOk = 0;
          }

          // Allow certain file formats
          if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
          ) {
            echo "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
            $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            echo "<p>Sorry, your file was not uploaded.</p>";
            // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file)) {
              echo "<p>The file " . htmlspecialchars(basename($_FILES["book_image"]["name"])) . " has been uploaded.</p>";
            } else {
              echo "<p>Sorry, there was an error uploading your file.</p>";
            }
          }
        }
        ?>

        <div class="col-xs-12 col-sm-3">
          <form action="" method="post" enctype="multipart/form-data">
            <label for="book_image">Upload Image:</label>
            <input type="file" name="book_image" id="book_image">
            <input type="submit" value="Upload" name="submit">
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thumbnail">
            <img src="uploads/placeholder.jpg" alt="Kesehatan" class="img-responsive">
          </a>
          <p>Kesehatan</p>
        </div>
        <!-- Add other categories similarly -->
      </div>
    </div>
  </section>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.7.1min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>