<?php
session_start();
include "../koneksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['kirimDataDiri'])) {
    // Retrieve form data
    $idUser = $_SESSION['data']['id_user'];
    $idArea = $_POST['id_area'];
    $pilihPaket = $_POST['pilihPaket'];
    
    // Fetch id_layanan based on the selected package
    $query = "SELECT id_layanan FROM layanan WHERE deskripsi = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $pilihPaket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idLayanan = $row['id_layanan'];
    } else {
        echo "Paket tidak ditemukan.";
        exit();
    }

    $stmt->close();

    $tanggalPesanan = date('Y-m-d');

    $sql = "INSERT INTO pesanan (id_user, id_layanan, id_area, tanggal_pesanan) VALUES ('". $idUser ."', '". $idLayanan ."', '". $idArea ."', '". $tanggalPesanan ."')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header("Location: ../home/index.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>
