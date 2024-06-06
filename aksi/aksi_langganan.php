<?php
session_start();
include "../koneksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['submit'])) {
    // Retrieve form data
    $idUser = $_SESSION['data']['id_user'];
    $idArea = $_POST['id_area'];
    $pilihPaket = $_POST['pilihPaket'];
    var_dump($idArea);
    
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

    // Get current date and time
    $tanggalPesanan = date('Y-m-d H:i:s');
    $status = 'Pending';

    // Prepare the SQL statement to insert into pesanan
    $stmt = $koneksi->prepare("INSERT INTO pesanan (id_user, id_layanan, id_area, tanggal_pesanan, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $idUser, $idLayanan, $idArea, $tanggalPesanan, $status);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../dashboard/success.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>
