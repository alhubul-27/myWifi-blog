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
    $id_user = $_POST['id_user'];
    $level = 'user';

    $sql = "UPDATE register SET ";

    if (!empty($_POST['password'])) {
        $psw = $_POST['password'];
        $sql .= "password = '" . $psw . "', ";
    }

    $sql .= "nm_lengkap = '" . $nm_lengkap . "', email = '" . $email . "', no_hp = '" . $nohp . "', alamat = '" . $alamat . "' WHERE id_user = '" . $id_user . "'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: admin.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if (isset($_POST['deleteAdmin'])) {
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

    $sql = "INSERT INTO area_layanan (kota, provinsi, kode_pos) VALUES ('" . $kota . "', '" . $provinsi . "', '" . $kode_pos . "')";
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

if (isset($_POST['deleteAreaLayanan'])) {
    $id_area = $_GET['id'];

    $sql = "DELETE FROM area_layanan WHERE id_area = '$id_area'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: area-layanan.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

// Aksi Riwayat Transaksi
if (isset($_POST['deleteRiwayatTransaksi'])) {
    $id_pembayaran = $_GET['id'];

    $sql = "SELECT id_pesanan FROM payment WHERE id_pembayaran= '$id_pembayaran'";
    $query = $koneksi->query($sql);
    $data = $query->fetch_assoc();

    $sql = "DELETE FROM payment WHERE id_pembayaran = '$id_pembayaran'";
    $query = $koneksi->query($sql);

    if (isset($data['id_pesanan'])) {
        $sql = "DELETE FROM pesanan WHERE id_pesanan = '". $data['id_pesanan'] . "'";
        $query = $koneksi->query($sql);

        if ($query === true) {
            header('Location: riwayat-transaksi.php');
        } else {
            echo "Error: " . $koneksi->error;
        }
    } else {
        echo "Error: id_pesanan not found in payment table";
    }
}

// Aksi Teknisi
if (isset($_POST['addTeknisi'])) {
    $nama_teknisi = $_POST['nama_teknisi'];
    $no_teknisi = $_POST['no_teknisi'];
    $keahlian = $_POST['keahlian'];

    $sql = "INSERT INTO teknisi (nama_teknisi, no_teknisi, keahlian) VALUES ('" . $nama_teknisi . "', '" . $no_teknisi . "', '" . $keahlian . "')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: teknisi.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if (isset($_POST['editTeknisi'])) {
    $nama_teknisi = $_POST['nama_teknisi'];
    $no_teknisi = $_POST['no_teknisi'];
    $keahlian = $_POST['keahlian'];
    $id_teknisi = $_POST['id_teknisi'];

    $sql = "UPDATE teknisi SET nama_teknisi = '$nama_teknisi', no_teknisi = '$no_teknisi', keahlian = '$keahlian' WHERE id_teknisi = $id_teknisi";

    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: teknisi.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if (isset($_POST['deleteTeknisi'])) {
    $id_teknisi = $_GET['id'];

    $sql = "DELETE FROM teknisi WHERE id_teknisi = '$id_teknisi'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: teknisi.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

// Aksi Ulasan
if (isset($_POST['deleteUlasan'])) {
    $id_ulasan = $_GET['id'];

    $sql = "DELETE FROM ulasan WHERE id_ulasan = '$id_ulasan'";

    $query = $koneksi->query($sql);
    if ($query === true) {
        header('Location: ulasan.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

// Aksi Layanan (Menyusul)



