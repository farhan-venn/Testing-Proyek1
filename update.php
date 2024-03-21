<?php
include 'koneksi.php';

// Mengambil ID dari parameter URL
$id = $_GET['updateid'];

// Mengambil data yang akan di-update dari database
$query = "SELECT * FROM peminjaman WHERE id = $id";
$result = $koneksi->query($query);

// Mengecek apakah data dengan ID tersebut ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari formulir
        $nisn = isset($_POST['nisn']) ? $_POST['nisn'] : '';
        $nama_siswa = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : '';
        $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
        $kode_buku = isset($_POST['kode_buku']) ? $_POST['kode_buku'] : '';
        $tanggal_peminjaman = isset($_POST['tanggal_peminjaman']) ? $_POST['tanggal_peminjaman'] : '';
        $status_pengembalian = isset($_POST['status_pengembalian']) ? $_POST['status_pengembalian'] : '';

        // Update data ke dalam tabel peminjaman
        $update_query = "UPDATE `peminjaman` SET 
                         nisn='$nisn', 
                         nama_siswa='$nama_siswa', 
                         judul_buku='$judul_buku', 
                         kode_buku='$kode_buku', 
                         tanggal_peminjaman='$tanggal_peminjaman', 
                         status_pengembalian='$status_pengembalian' 
                         WHERE id = $id";

        if ($koneksi->query($update_query)) {
            header("location: pengembalian.php");
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

    <title>Admin SIPERLOH</title>

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
                            <a class="dropdown-item" href="index.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Kembali
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Form Update Data Peminjaman Buku -->
            <div class="container">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Form Update Data Peminjaman Buku
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <label>NISN:</label>
                                <input type="text" class="form-control" name="nisn" maxlength="10" required
                                    value="<?php echo $row['nisn']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa:</label>
                                <input type="text" class="form-control" name="nama_siswa" required
                                    value="<?php echo $row['nama_siswa']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Judul Buku:</label>
                                <input type="text" class="form-control" name="judul_buku" required
                                    value="<?php echo $row['judul_buku']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kode Buku:</label>
                                <input type="text" class="form-control" name="kode_buku" maxlength="3" required
                                    value="<?php echo $row['kode_buku']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Peminjaman:</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman" required
                                    value="<?php echo $row['tanggal_peminjaman']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Status Pengembalian:</label>
                                <select class="form-control" name="status_pengembalian" required>
                                    <option value="belum kembali" <?php echo ($row['status_pengembalian'] == 'belum kembali') ? 'selected' : ''; ?>>
                                        Belum Kembali
                                    </option>
                                    <option value="sudah kembali" <?php echo ($row['status_pengembalian'] == 'sudah kembali') ? 'selected' : ''; ?>>
                                        Sudah Kembali
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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
        </div>
    </div>
</body>

</html>