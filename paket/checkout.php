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
                    <p id="modalNamaLengkap"></p>
                    <p id="modalPilihPaket"></p>
                    <p id="modalPilihArea"></p>
                    <a href="pembayaran.php" class="btn btn-primary">Pembayaran</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const namaLengkap = sessionStorage.getItem('namaLengkap');
            const pilihPaket = sessionStorage.getItem('pilihPaket');
            const pilihArea = sessionStorage.getItem('pilihArea');

            document.getElementById('modalNamaLengkap').innerText = `Nama Lengkap: ${namaLengkap}`;
            document.getElementById('modalPilihPaket').innerText = `Paketmu: ${pilihPaket}`;
            document.getElementById('modalPilihArea').innerText = `Areamu: ${pilihArea}`;
        });
    </script>
</body>
</html>
