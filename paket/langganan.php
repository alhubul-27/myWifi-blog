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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>My Wifi</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../dashboard/index.php">My Wifi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../dashboard/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../promo/promo.php">Promo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Paket
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../paket/wifi.php">Wifi</a></li>
              <li><a class="dropdown-item" href="../paket/tv.php">TV Parabola</a></li>
            </ul>
          <li class="nav-item">
            <a class="nav-link" href="../layanan/layanan.php">Layanan</a>
          </li>
        </ul>

        <?php if (isset($_SESSION['data'])) : ?>
          <div class="flex-shrink-0 dropdown">
            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../aksi/aksi_login.php?op=out">Sign out</a></li>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <div class="container">
    <form action="../aksi/aksi_langganan.php" method="post">
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
        <input type="text" class="form-control" id="pilihPaket" name="pilihPaket" placeholder="Nama Lengkap" value="<?= $_GET['paket'] ?> Mbps">
      </div>
      <div class="mb-3">
        <label for="pilihPaket" class="form-label">Pilih Paket</label>
        <select class="form-select" name="id_area" aria-label="Default select example">
          <option value="0" selected>Open this select menu</option>
          <?php foreach ($rows as $row) : ?>
            <option value="<?= $row['id_area'] ?>"><?= $row['kota'] . ", " . $row['provinsi'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-send"></i> Kirim Data</button>
    </form>
  </div>
</body>

</html>