<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/1.png" alt="" class="img-responsive">
          </a>
          <p>Kesehatan</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/2.png" alt="" class="img-responsive">
          </a>
          <p>Seni</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/3.png" alt="" class="img-responsive">
          </a>
          <p>Pendidikan</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/4.png" alt="" class="img-responsive">
          </a>
          <p>Agama</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/5.png" alt="" class="img-responsive">
          </a>
          <p>Fiksi & non-fiksi</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/6.png" alt="" class="img-responsive">
          </a>
          <p>Ilmiah</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/7.png" alt="" class="img-responsive">
          </a>
          <p>Sastra & Bahasa</p>
        </div>
        <div class="col-xs-12 col-sm-3">
          <a href="hasil_koleksi.php" class="img-thubnail">
            <img src="images/9.png" alt="" class="img-responsive">
          </a>
          <p>Sejarah</p>
        </div>
      </div>
    </div>
  </section>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.7.1min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>