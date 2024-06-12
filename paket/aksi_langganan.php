<?php
session_start();
include "../koneksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['kirimDataDiri'])) {
    $idUser = $_SESSION['data']['id_user'];
    $idArea = $_POST['id_area'];
    $pilihPaket = $_POST['pilihPaket'];
    
    // Debugging: Print $pilihPaket to check its value
    echo "Paket yang dipilih: " . $pilihPaket . "<br>";

    $query = "SELECT id_layanan, harga FROM layanan WHERE deskripsi = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $pilihPaket);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Debugging: Check if query executed properly and if any rows are returned
    if ($result === false) {
        echo "Error dalam query: " . $koneksi->error . "<br>";
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idLayanan = $row['id_layanan'];
        $harga = $row['harga']; // Ambil harga layanan

        // Debugging: Print idLayanan and harga
        echo "ID Layanan: " . $idLayanan . "<br>";
        echo "Harga: " . $harga . "<br>";
    } else {
        echo "Paket tidak ditemukan.";
        exit();
    }

    $tanggalPesanan = date('Y-m-d');

    $sql = "INSERT INTO pesanan (id_user, id_layanan, id_area, tanggal_pesanan) VALUES ('". $idUser ."', '". $idLayanan ."', '". $idArea ."', '". $tanggalPesanan ."')";

    if ($koneksi->query($sql) === true) {
        $id = $koneksi->insert_id;
        header("Location: checkout.php?id=" . $id);
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}

if(isset($_GET['ids']) && isset($_GET['hrg'])){
    $id_pesanan = $_GET['ids'];
    $harga = $_GET['hrg'];
    $tanggal_pembayaran = date('Y-m-d');
    $status = "PAID";

    $sql = "INSERT INTO payment (id_pesanan, harga, tanggal_pembayaran, status) VALUES ('" . $id_pesanan . "', '" . $harga . "', '" . $tanggal_pembayaran . "', '" . $status ."')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: ../home/index.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

$koneksi->close();
?>
