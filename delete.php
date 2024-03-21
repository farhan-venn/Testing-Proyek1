<?php
include 'koneksi.php';

if (isset($_GET['deleteid'])) {
    // Validasi input
    $id = intval($_GET['deleteid']);

    if ($id <= 0) {
        die("Invalid ID");
    }

    // Menyiapkan pesan konfirmasi JavaScript
    $confirmationMessage = "Apakah Anda yakin ingin menghapus data ini?";

    $sql = "DELETE FROM `peminjaman` WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    // Menampilkan pesan konfirmasi menggunakan JavaScript
    echo "<script>
            var confirmation = confirm('$confirmationMessage');
            if (confirmation) {
                // Jika user memilih 'OK', hapus data dari database
                alert('Data siswa berhasil dihapus!');
                document.location.href = 'pengembalian.php';
            } else {
                // Jika user memilih 'Cancel', tampilkan pesan dan tidak lakukan penghapusan
                alert('Penghapusan data dibatalkan.');
                document.location.href = 'pengembalian.php';
            }
        </script>";
}
?>