<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
    $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
    $kode_buku = isset($_POST['kode_buku']) ? $_POST['kode_buku'] : '';
    $nama_penulis = isset($_POST['nama_penulis']) ? $_POST['nama_penulis'] : '';
    $jumblah_tersedia = isset($_POST['jumblah_tersedia']) ? $_POST['jumblah_tersedia'] : '';

    // Cek apakah NISN sudah ada di database
    $cek_query = "SELECT * FROM koleksi WHERE kategori = '$kategori'";
    $result = $koneksi->query($cek_query);

    if ($result->num_rows > 0) {
        echo "Data dengan kategori $kategori sudah ada dalam database.";
    } else {
        // Tambahkan data ke tabel peminjaman
        $query = "INSERT INTO koleksi (kategori, judul_buku, kode_buku, nama_penulis, jumblah_tersedia) 
                  VALUES ('$kategori', '$judul_buku', '$kode_buku', '$nama_penulis', '$jumblah_tersedia')";

        if ($koneksi->query($query)) {
            header("location: koleksi_buku.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
        }
    }

    // Tutup koneksi ke database
    $koneksi->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin SIPERLOH pengembalian</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Siperloh <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Peminjaman
            </div>

            <!-- Nav Item - Datapeminjam -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Peminjaman</span></a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Peminjaman:</h6>
                        <a class="collapse-item" href="peminjaman.php">Peminjaman</a>
                        <a class="collapse-item" href="pengembalian.php">Pengembalian</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Buku
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Koleksi Buku</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Koleksi Buku:</h6>
                        <a class="collapse-item" href="input_buku.php">Input</a>
                        <a class="collapse-item" href="koleksi_buku.php">Kategori</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengunjung
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="pengunjung.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pengunjung</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tentang
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Tentang</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="images/5.jpg" alt="...">
                <p class="text-center mb-2"><strong>Admin Siperloh</strong> Selamat tinggal </p>
                <a class="btn btn-success btn-sm" href="index.html">Logout</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-1 d-none d-lg-inline text-gray-500 small">SIPERLOH (Sistem perpustakaan
                                    SMAN 1 LOHBENER)</span>
                                <img class="img-profile rounded-circle" src="images/5.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-----from peminjamn----->
                <div class="container">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            From Input Koleksi Buku
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label>Kategori:</label>
                                    <select class="form-control" name="kategori" required>
                                        <option value="Kesehatan">Kesehatan</option>
                                        <option value="Seni">Seni</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Agama">Agama</option>
                                        <option value="Fiksi & non-fiksi">Fiksi & non-fiksi</option>
                                        <option value="Ilmiah">Ilmiah</option>
                                        <option value="Sastra & bahasa">Sastra & bahasa</option>
                                        <option value="Sejarah">Sejarah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control"
                                        placeholder="Masukkan Judul Buku Anda Disini!" name="judul_buku" required>
                                </div>
                                <div class="form-group">
                                    <label>Kode Buku:</label>
                                    <input type="text" class="form-control"
                                        placeholder="Masukkan Kode buku Anda Disini!" name="kode_buku" maxlength="3"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Penulis:</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Penulis Disini!"
                                        name="nama_penulis" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumblah Tersedia:</label>
                                    <input type="number" class="form-control"
                                        placeholder="Masukkan Jumlah Tersedia Disini!" name="jumblah_tersedia"
                                        maxlength="3" required>
                                </div>
                                <button type="submit" class="btn btn-danger">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ingin Logout?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Apakah anda yakin ingin Logout?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="index.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>