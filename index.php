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

  <!-- Additional CSS for the "kontak" and "tentang" sections -->
  <style>
    .navbar-default {
      text-decoration: none;
      background-color: #ffff;
      padding: 30px;
    }

    .Tulisan {
      margin-top: 70px;
    }

    .gambar {
      height: 200px;
      width: 350px;
    }

    .tentang {
      margin-top: 80px;
      background-color: #28a745;
      /* Green background color */
      padding: 20px;
      /* Add padding for better visibility */
      text-align: center;
      /* Center the content */
    }

    .tentang h2 {
      color: #fff;
      /* Set text color to white */
    }

    .tentang hr {
      width: 250px;
      border-top: 3px solid #fff;
      /* Set border color to white */
    }

    .tentang p {
      color: #fff;
      /* Set text color to white */
      margin: 15px 0;
      /* Add margin for better readability */
    }

    .Kontak hr {
      width: 250px;
      border-top: 3px solid;
    }

    .Kontak {
      background-color: #000;
      color: #fff;
      padding: 50px 0;
      margin-top: 20px;
      /* Add margin to create space between sections */
    }

    .Kontak h2 {
      color: #fff;
    }

    .Kontak button {
      color: #fff;
      background-color: transparent;
      border: 1px solid #fff;
      margin-right: 5px;
    }

    .Kontak .kontak1 p,
    .Kontak .kontak2 p {
      color: #fff;
    }

    .glyphicon {
      color: #fff;
    }
  </style>
  <!-- End of additional CSS -->

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
          <li style="width: 120px;"><a href="#home" class="page-scroll">Home</a></li>
          <li style="width: 120px;"><a href="login.php">Admin</a></li>
          <li style="width: 120px;"><a href="#tentang" class="page-scroll">Tentang</a></li>
          <li style="width: 120px;"><a href="#kontak" class="page-scroll">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--akhir navbar-->

  <!--Home-->
  <section class="Home" id="home">
    <div class="container">
      <div class="row">
        <div class="Tulisan">
          <div class="col-sm-6">
            <h4>Selamat Datang,<br>
              Siswa Siswi SMAN 1 Lohbener
            </h4>
            <h1> <strong>Ayo membaca!</strong></h1>
            <br>
            <p>Bersama buku, kita bisa pergi ke tempat-tempat yang
              belum pernah kita kunjungi sebelumnya</p>
            <hr>
            <p><a class="btn btn-primary btn-lg" href="koleksi.php" role="button">Koleksi Buku</a>
              <a class="btn btn-primary btn-lg" href="data_peminjam.php" role="button">Data peminjaman</a>
            </p>
            <p>Baca lebih banyak, temukan lebih banyak, dan menjadi lebih banyak</p>
            <p><a class="btn btn-primary btn-lg" href="data_pengunjung.php" role="button">Data pengunjung</a></p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="gambar">
            <img src="images/8.png" alt="Responsive-image" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- akhir Home-->

  <!---tentang-->
  <section class="tentang" id="tentang" style="background-color: #000; color: #fff;">
    <div class="container">
      <div class="row">
        <div class="text-center">
          <h2>Tentang</h2>
          <hr>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p class="text-center">Website Siperloh (Sistem Perpustakaan SMAN 1 Lohbener) ini berfungsi sebagai sumber
              informasi digital yang menyimpan lokasi koleksi buku, jurnal, artikel, dan materi pendidikan lainnya yang
              relevan dan ada di SMAN 1 Lohbener
              <br>
              <br>

              Website Siperloh adalah platfrom online yang dibuat untuk memberikan akses kepada siswa, guru, dan staf
              perpustakaan.
              <br>
              <br>

              Tujuan utama website ini adalah untuk meningkatkan aksesibilitas terhadap sumber-sumber pendidikan,
              mendukung pembelajaran, dan memfasilitasi penelitian siswa dan pengajar.
              <br>
              <br>

              Website Siperloh dapat diakses kapan saja selama 24 jam sehingga memberikan akses yang lebih fleksibel
              bagi penggunanya
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!----akhir tentang-->

  <!---kontak-->
  <section class="Kontak" id="kontak">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2>Kontak</h2>
          <hr>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 text-left">
            <div class="kontak1">
              <h2>Kontak</h2>
              <p>
                <button type="button" class="btn btn-default" aria-label="Left Align">
                  <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                </button>0853 2303 8861<br>
                perpustakaanSaloh@gmail.com
              </p>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <h2>Lokasi</h2>
            <p>
              <button type="button" class="btn btn-default" aria-label="Left Align">
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
              </button>Jl.Celeng.SMAN 1 Lohbener<br>
              Indramayu-Jawa Barat
            </p>
          </div>
          <div class="col-sm-4 text-right">
            <div class="kontak2">
              <h2>Jam Operasional</h2>
              <p>
                <button type="button" class="btn btn-default" aria-label="Left Align">
                  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                </button>08.00 - 16.00 WIB<br>
                senin-jumat
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!----akhir kontak-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <script src="js/script.js"></script>

</body>

</html>