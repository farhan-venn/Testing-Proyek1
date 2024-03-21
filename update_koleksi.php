<?php
include 'koneksi.php';

// Mengambil ID dari parameter URL
$id = $_GET['updateeid'];

// Mengambil data yang akan di-update dari database
$query = "SELECT * FROM koleksi WHERE id = $id";
$result = $koneksi->query($query);

// Mengecek apakah data dengan ID tersebut ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari formulir
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
        $kode_buku = isset($_POST['kode_buku']) ? $_POST['kode_buku'] : '';
        $nama_penulis = isset($_POST['nama_penulis']) ? $_POST['nama_penulis'] : '';
        $jumblah_tersedia = isset($_POST['jumblah_tersedia']) ? $_POST['jumblah_tersedia'] : '';

        // Update data ke dalam tabel koleksi
        $update_query = "UPDATE `koleksi` SET 
                        kategori='$kategori', 
                        judul_buku='$judul_buku', 
                        kode_buku='$kode_buku', 
                        nama_penulis='$nama_penulis', 
                        jumblah_tersedia='$jumblah_tersedia' 
                        WHERE id = $id";

        if ($koneksi->query($update_query)) {
            header("location: koleksi_buku.php");
            exit();
        } else {
            echo "Error: " . $update_query . "<br>" . $koneksi->error;
            exit();
        }
    }
} else {
    echo "Data dengan ID $id tidak ditemukan dalam database.";
    exit();
}

// Tutup koneksi ke database
$koneksi->close();
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
                            <span class="mr-1 d-none d-lg-inline text-gray-500 small">SIPERLOH (Sistem perpustakaan SMAN
                                1 LOHBENER)</span>
                            <img class="img-profile rounded-circle" src="images/5.jpg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.html" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Form Input Koleksi Buku -->
            <div class="container">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        Form Update Koleksi Buku
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Kategori:</label>
                                <select class="form-control" name="kategori" required>
                                    <option value="Kesehatan" <?php echo ($row['kategori'] == 'Kesehatan') ? 'selected' : ''; ?>>
                                        Kesehatan
                                    </option>
                                    <option value="Seni" <?php echo ($row['kategori'] == 'Seni') ? 'selected' : ''; ?>>
                                        Seni
                                    </option>
                                    <option value="Pendidikan" <?php echo ($row['kategori'] == 'Pendidikan') ? 'selected' : ''; ?>>
                                        Pendidikan
                                    </option>
                                    <option value="Agama" <?php echo ($row['kategori'] == 'Agama') ? 'selected' : ''; ?>>
                                        Agama
                                    </option>
                                    <option value="Fiksi & non-fiksi" <?php echo ($row['kategori'] == 'Fiksi & non-fiksi') ? 'selected' : ''; ?>>
                                        Fiksi & non-fiksi
                                    </option>
                                    <option value="Ilmiah" <?php echo ($row['kategori'] == 'Ilmiah') ? 'selected' : ''; ?>>
                                        Ilmiah
                                    </option>
                                    <option value="Sastra & bahasa" <?php echo ($row['kategori'] == 'Sastra & bahasa') ? 'selected' : ''; ?>>
                                        Sastra & bahasa
                                    </option>
                                    <option value="Sejarah" <?php echo ($row['kategori'] == 'Sejarah') ? 'selected' : ''; ?>>
                                        Sejarah
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input type="text" class="form-control" placeholder="Masukkan judul buku anda disini!"
                                    name="judul_buku" required value="<?php echo $row['judul_buku']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kode Buku:</label>
                                <input type="number" class="form-control" placeholder="Masukkan Kode buku anda disini!"
                                    name="kode_buku" maxlength="3" required value="<?php echo $row['kode_buku']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Penulis:</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama penulis disini!"
                                    name="nama_penulis" required value="<?php echo $row['nama_penulis']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Tersedia:</label>
                                <input type="number" class="form-control" placeholder="Masukkan jumlah tersedia disini!"
                                    name="jumblah_tersedia" maxlength="3" required
                                    value="<?php echo $row['jumblah_tersedia']; ?>">
                            </div>
                            <button type="submit" class="btn btn-danger">Update</button>
                        </form>
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