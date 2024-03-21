<?php
include 'koneksi.php';

// Initialize variables to avoid undefined variable notices
$start_date = $end_date = $result = null;

// Pagination settings
$records_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $search_term = $_POST['search'];

    $sql = "SELECT * FROM `peminjaman` WHERE 
            `tanggal_peminjaman` BETWEEN '$start_date' AND '$end_date' AND 
            (`nisn` LIKE '%$search_term%' OR 
             `nama_siswa` LIKE '%$search_term%' OR 
             `judul_buku` LIKE '%$search_term%' OR 
             `kode_buku` LIKE '%$search_term%' OR 
             `tanggal_peminjaman` LIKE '%$search_term%' OR 
             `status_pengembalian` LIKE '%$search_term%')";

    // Fetch data with pagination
    $sql .= " LIMIT $records_per_page OFFSET $offset";
    $result = mysqli_query($koneksi, $sql);
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
            <div class="card">
                <div class="card-header bg-info text-white">
                    Laporan Peminjaman Buku Periode Tertentu
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="start_date">Tanggal Awal</label>
                                <input type="date" class="form-control" name="start_date" required
                                    value="<?php echo $start_date; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_date">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="end_date" required
                                    value="<?php echo $end_date; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="search">Cari</label>
                            <input type="text" class="form-control" id="search" name="search"
                                placeholder="Masukkan kata kunci">
                        </div>
                        <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                    </form>
                </div>
            </div>

            <!-- Display the report table if the result is available -->
            <?php if ($result): ?>
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        Laporan Peminjaman Buku Periode
                        <?php echo $start_date; ?> sampai
                        <?php echo $end_date; ?>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Kode Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Status Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $serial_number = 1 + ($page - 1) * $records_per_page;
                                while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $serial_number++; ?>
                                        </th>
                                        <td>
                                            <?php echo $row['nisn']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nama_siswa']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['judul_buku']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['kode_buku']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['tanggal_peminjaman']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['status_pengembalian']; ?>
                                        </td>
                                    </tr>
                                <?php endwhile;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination links -->
                <div class="card mt-4">
                    <div class="card-body">
                        <?php
                        $sql = "SELECT COUNT(*) FROM `peminjaman` WHERE `tanggal_peminjaman` BETWEEN '$start_date' AND '$end_date'";
                        $result = mysqli_query($koneksi, $sql);
                        $row = mysqli_fetch_row($result);
                        $total_records = $row[0];
                        $total_pages = ceil($total_records / $records_per_page);

                        echo "<ul class='pagination justify-content-center'>";
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                        }
                        echo "</ul>";
                        ?>
                    </div>
                </div>
            <?php endif; ?>

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