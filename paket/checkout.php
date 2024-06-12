<?php
session_start();
include "../koneksi/koneksi.php";

// Ambil id pesanan dari URL
$id_pesanan = $_GET['id'];

// Query untuk mendapatkan data pesanan dan area
$sql = "SELECT pesanan.*, register.nm_lengkap, layanan.deskripsi, layanan.harga, area_layanan.kota, area_layanan.provinsi 
        FROM pesanan 
        JOIN register ON pesanan.id_user = register.id_user
        JOIN layanan ON pesanan.id_layanan = layanan.id_layanan
        JOIN area_layanan ON pesanan.id_area = area_layanan.id_area
        WHERE id_pesanan = $id_pesanan";
$query = $koneksi->query($sql);
$data = $query->fetch_assoc();

// Ambil teknisi berdasarkan area dan keahlian
$keahlian = ($data['id_layanan'] <= 4) ? 'WiFi' : 'TV'; // Asumsi id_layanan 1-4 adalah WiFi, 5-8 adalah TV
$id_area = $data['id_area'];

// Query untuk mendapatkan teknisi yang sesuai
$sql_teknisi = "SELECT teknisi.* FROM teknisi_area 
                JOIN teknisi ON teknisi_area.id_teknisi = teknisi.id_teknisi
                WHERE teknisi_area.id_area = $id_area AND teknisi.keahlian = '$keahlian' LIMIT 1";
$query_teknisi = $koneksi->query($sql_teknisi);
$teknisi = $query_teknisi->fetch_assoc();

// Jika user menerima teknisi, simpan data ke tabel pesanan_teknisi
if (isset($_GET['accept']) && $_GET['accept'] == 'yes') {
    $sql_insert = "INSERT INTO pesanan_teknisi (id_pesanan, id_teknisi) VALUES ($id_pesanan, " . $teknisi['id_teknisi'] . ")";
    if ($koneksi->query($sql_insert) === TRUE) {
        // Redirect ke halaman pembayaran atau halaman lain yang diinginkan
        header("Location: aksi_langganan.php?ids=$id_pesanan&hrg=" . $data['harga']);
        exit;
    } else {
        echo "Error: " . $sql_insert . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header, .card-title {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
                Pemberitahuan
            </div>
            <div class="card-body">
                <h5 class="card-title">Apakah Data Sudah Sesuai?</h5>
                <div class="modal-body">
                    <p id="modalNamaLengkap"><?= $data['nm_lengkap']; ?></p>
                    <p id="modalPilihPaket"><?= $data['deskripsi']; ?></p>
                    <p id="modalPilihArea"><?= $data['kota'] . ", " . $data['provinsi']; ?></p>
                    <p id="modalNamaTeknisi"><?= $teknisi['nama_teknisi']; ?></p>
                    <a href="?id=<?= $id_pesanan ?>&accept=yes" class="btn btn-primary">Terima Teknisi dan Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
