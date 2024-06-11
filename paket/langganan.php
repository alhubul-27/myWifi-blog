<?php
session_start();
include "../koneksi/koneksi.php";
if (isset($_SESSION['data'])) {
    $sql = "SELECT * FROM area_layanan";
    $result = $koneksi->query($sql);
    $rows = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }
} else {
    header('location:../form/form_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>My Wifi</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .modal-footer .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .modal-footer .btn-primary:hover {
            background-color: #0056b3;
        }
        <style>
    /* Style untuk judul modal */
    .modal-title {
        color: #333;
        font-weight: bold;
    }

    /* Style untuk label dan teks pada modal */
    .form-label {
        color: #666;
        font-weight: bold;
    }

    /* Style untuk konten modal */
    .modal-body {
        padding: 20px;
    }

    /* Style untuk footer modal */
    .modal-footer {
        justify-content: flex-start; /* Mendorong tombol Tutup ke sisi kiri */
        border-top: none; /* Menghapus border atas */
    }

    /* Style untuk tombol Tutup */
    .btn-secondary {
        background-color: #ccc;
        color: #333;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    /* Hover effect untuk tombol Tutup */
    .btn-secondary:hover {
        background-color: #bbb;
    }
</style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home/index.php">My Wifi</a>
        </div>
    </nav>

    <div class="container">
        <form id="reviewForm" action="../aksi/aksi_langganan.php" method="post">
            <input type="text" class="form-control visually-hidden" name="id_user" value="<?= $_SESSION['data']['id_user'] ?>">
            <div class="mb-3">
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" value="<?= $_SESSION['data']['nm_lengkap'] ?>">
            </div>
            <div class="row">
                <div class="col">
                    <label for="nomerHandphone" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="nomerHandphone" name="nomerHandphone" placeholder="Nomor Handphone" value="<?= $_SESSION['data']['no_hp'] ?>" aria-label="Nomor Handphone">
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $_SESSION['data']['email'] ?>" aria-label="Email">
                </div>
            </div>
            <div class="mb-3">
                <label for="pilihPaket" class="form-label">Pilih Paket</label>
                <input type="text" class="form-control" id="pilihPaket" name="pilihPaket" placeholder="Pilih Paket" value="<?= $_GET['paket'] ?>">
            </div>
            <div class="mb-3">
                <label for="pilihArea" class="form-label">Pilih Area</label>
                <select class="form-select" id="pilihArea" name="id_area" aria-label="Default select example">
                    <option value="0" selected>Pilih Area Layanan</option>
                    <?php foreach ($rows as $row) : ?>
                        <option value="<?= $row['id_area'] ?>"><?= $row['kota'] . ", " . $row['provinsi'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="button" id="submitButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout"><i class="bi bi-send"></i> Kirim Data</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="checkout" aria-hidden="true" aria-labelledby="checkoutLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutLabel">Konfirmasi Paket</h5>
                </div>
                <div class="modal-body">
                    <p id="modalNamaLengkap"></p>
                    <p id="modalPilihPaket"></p>
                    <p id="modalPilihArea"></p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Pembayaran</button>
                </div>
            </div>
        </div>
    </div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Rincian Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="transactionDate" class="form-label">Tanggal Transaksi:</label>
                            <p id="transactionDate"></p>
                        </div>
                        <div class="mb-3">
                            <label for="schedule" class="form-label">Jadwal:</label>
                            <p id="schedule"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="counselor" class="form-label">Teknisi:</label>
                            <p id="counselor"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        async function fetchData() {
            try {
                const response = await fetch('/getPaymentData.php');
                const data = await response.json();

                const transactionDate = new Date(data.tanggal_pembayaran).toLocaleDateString();
                const scheduleDate = new Date(data.tanggal_pembayaran);
                scheduleDate.setDate(scheduleDate.getDate() + 1);
                const schedule = `${scheduleDate.toLocaleDateString()} / 09:00 WIB`;
                const counselor = data.nama_teknisi;

                document.getElementById('transactionDate').textContent = `Transaksi: ${transactionDate}`;
                document.getElementById('schedule').textContent = `Jadwal: ${schedule}`;
                document.getElementById('counselor').textContent = `Konselor: ${counselor}`;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        document.getElementById('submitButton').addEventListener('click', function() {
            const namaLengkap = document.getElementById('namaLengkap').value;
            const pilihPaket = document.getElementById('pilihPaket').value;
            const pilihAreaSelect = document.getElementById('pilihArea');
            const pilihArea = pilihAreaSelect.options[pilihAreaSelect.selectedIndex].text;

            document.getElementById('modalNamaLengkap').innerText = `Nama Lengkap: ${namaLengkap}`;
            document.getElementById('modalPilihPaket').innerText = `Paketmu : ${pilihPaket}`;
            document.getElementById('modalPilihArea').innerText = `Areamu : ${pilihArea}`;

            fetchData();
        });
    </script>
</body>
</html>
