<?php
include "../koneksi/koneksi.php";

// Aksi Admin
if (isset($_POST['addAdmin'])) {
    $nm_lengkap = $_POST['nm_lengkap'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $level = 'admin';

    $sql = "INSERT INTO register (username, ";

    if (!empty($_POST['password'])) {
        $psw = $_POST['password'];
        $sql .= "password, ";
    }

    $sql .= "nm_lengkap, email, no_hp, alamat, level) VALUES ('" . $user . "', ";

    if (!empty($_POST['password'])) {
        $sql .= "'" . $psw . "', ";
    }

    $sql .= "'" . $nm_lengkap . "', '" . $email . "', '" . $nohp . "', '" . $alamat . "', '" . $level . "')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if (isset($_POST['editAdmin'])) {
    $nm_lengkap = $_POST['nm_lengkap'];
    $user = $_POST['username'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $level = 'user';

    $sql = "UPDATE register SET ";

    if (!empty($_POST['password'])) {
        $psw = $_POST['password'];
        $sql .= "password = '" . $psw . "', ";
    }

    $sql .= "nm_lengkap = '" . $nm_lengkap . "', email = '" . $email . "', no_hp = '" . $nohp . "', alamat = '" . $alamat . "' WHERE username = '" . $user . "'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if(isset($_POST['deleteAdmin'])){
    $id_user = $_GET['id'];

    $sql = "DELETE FROM register WHERE id_user = '$id_user'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

// Aksi Area Layanan
if (isset($_POST['addAreaLayanan'])) {
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];

    $sql = "INSERT INTO area_layanan (kota, provinsi, kode_pos) VALUES ('" . $kota ."', '". $provinsi ."', '". $kode_pos ."')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: area-layanan.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if (isset($_POST['editAreaLayanan'])) {
    $id_area = $_POST['id_area'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kode_pos = $_POST['kode_pos'];

    $sql = "UPDATE area_layanan SET kota = '$kota', provinsi = '$provinsi', kode_pos = '$kode_pos' WHERE id_area = $id_area";

    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: area-layanan.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if(isset($_POST['deleteAreaLayanan'])){
    $id_area = $_GET['id'];

    $sql = "DELETE FROM area_layanan WHERE id_area = '$id_area'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: area-layanan.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

