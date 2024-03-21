<?php
// Memanggil atau membutuhkan file function.php
require 'koneksi.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  // password menggunakan md5

  // mengambil data dari user dimana username yg diambil
  $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

  $cek = mysqli_num_rows($result);

  // jika $cek lebih dari 0, maka berhasil login dan masuk ke index.php
  if ($cek > 0) {
    $_SESSION['login'] = true;

    header('location:admin.php');
    exit;
  }
  // jika $cek adalah 0 maka tampilkan error
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPERLOH</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">

  <style>
    body {
      background-image: url('images/3409297.jpg');
      /* Replace 'your-image-path.jpg' with the actual path to your background image */
      background-size: cover;
      color: #ffffff;
      /* Set text color to contrast with the background */
    }
  </style>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <!--navbar--->
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
          <li style="width: 120px;"><a href="index.php" class="page-scroll">Home</a></li>
          <li style="width: 120px;"><a href="login.php">Admin</a></li>
          <li style="width: 120px;"><a href="index.php" class="page-scroll">Tentang</a></li>
          <li style="width: 120px;"><a href="index.php" class="page-scroll">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--akhir navbar-->
  <!-------halaman----login---->
  <div class="container">
    <div class="row my-5">
      <div class="login">
        <div class="col-md-6 text-center login" style="background-color: #000;">
          <h4><img alt="brand" src="images/9.jpg" width="50" height="50"><br>Login Admin</h4>
          <h6>Sistem Perpustakaan <br> SMA Negeri 1 Lohbener</h6>
          <!-- Ini Error jika tidak bisa login -->
          <?php if (isset($error)): ?>
            <?php echo '<script>alert("Username atau Password Salah!");</script>'; ?>
          <?php endif; ?>

          <form action="" method="post">
            <div class="form-group user">
              <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username"
                autocomplete="off" required>
            </div>
            <div class="form-group my-5">
              <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password"
                autocomplete="off" required>
            </div>
            <button class="btn btn-primary text-uppercase" type="submit" name="login">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-----akhir-login------>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

</body>

</html>