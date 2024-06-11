<?php
session_start();

// Simulasi data teknisi dan jadwal pemasangan
$teknisi = [
    ["id_teknisi" => 1, "nama_teknisi" => "Budi Santoso"],
    ["id_teknisi" => 2, "nama_teknisi" => "Siti Aminah"],
    // Tambahkan data lainnya sesuai kebutuhan
];
$jadwalPemasangan = [
    "2024-06-15 10:00",
    "2024-06-16 14:00",
    // Tambahkan jadwal lainnya sesuai kebutuhan
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Koneksi</title>
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
                Konfirmasi Pembayaran
            </div>
            <div class="card-body">
                <h5 class="card-title">Detail Transaksi</h5>
                <div class="modal-body">
                    <p id="modalNamaPaket">Nama Paket: <?= $_SESSION['pilihPaket'] ?></p>
                    <p id="modalJadwalPemasangan">Jadwal Pemasangan: <?= $jadwalPemasangan[0] ?></p>
                    <p id="modalNamaTeknisi">Teknisi: <?= $teknisi[0]['nama_teknisi'] ?></p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Lanjut ke Pembayaran</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Pembayaran -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Silahkan lakukan pembayaran sesuai dengan petunjuk yang tertera.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
