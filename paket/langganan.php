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
    <title>Form Input Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home/index.php">My Wifi</a>
        </div>
    </nav>

    <div class="container mt-5">
        <form id="reviewForm" action="konfirmasi.php" method="post">
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
            <button type="submit" class="btn btn-primary" id="submitButton" name="upload">Kirim Data</button>
        </form>
    </div>

    <script>
        document.getElementById('reviewForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form submit default

            const namaLengkap = document.getElementById('namaLengkap').value;
            const pilihPaket = document.getElementById('pilihPaket').value;
            const pilihAreaSelect = document.getElementById('pilihArea');
            const pilihArea = pilihAreaSelect.options[pilihAreaSelect.selectedIndex].text;

            // Simpan data di session storage atau local storage untuk sementara
            sessionStorage.setItem('namaLengkap', namaLengkap);
            sessionStorage.setItem('pilihPaket', pilihPaket);
            sessionStorage.setItem('pilihArea', pilihArea);

            // Redirect ke halaman konfirmasi
            window.location.href = 'checkout.php';
        });
    </script>
</body>
</html>