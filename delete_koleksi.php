<?php
include 'koneksi.php';

if (isset($_GET['deleteeid'])) {
    // Validasi input
    $id = intval($_GET['deleteeid']);

    if ($id <= 0) {
        die("Invalid ID");
    }

    // Menyiapkan pesan konfirmasi JavaScript
    $confirmationMessage = "Apakah Anda yakin ingin menghapus data ini?";

    $sql = "DELETE FROM `koleksi` WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    // Menampilkan pesan konfirmasi menggunakan JavaScript
    echo "<script>
            var confirmation = confirm('$confirmationMessage');
            if (confirmation) {
                // Jika user memilih 'OK', hapus data dari database
                alert('Data siswa berhasil dihapus!');
                document.location.href = 'koleksi_buku.php';
            } else {
                // Jika user memilih 'Cancel', tampilkan pesan dan tidak lakukan penghapusan
                alert('Penghapusan data dibatalkan.');
                document.location.href = 'koleksi_buku.php';
            }
        </script>";
}
?>