 <?php

session_start();
include "../koneksi/koneksi.php";
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['ulasan'])) {
    if (!isset($_SESSION['data'])) {
        header('Location: ../form/form_login.php');
        exit();
    }

    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $tanggalUlasan = date('Y-m-d H:i:s');

    $sql = "INSERT INTO ulasan (id_user, penilaian, komentar, tanggal_ulasan) VALUES ('" . $_SESSION['data']['id_user'] . "', '" . $rating . "', '" . $review . "', '" . $tanggalUlasan . "')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header('Location: index.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
}

if (isset($_POST['upload'])) {
    if (!isset($_SESSION['data'])) {
        header('Location: ../form/form_login.php');
        exit();
    }

    $kendala = $_POST['kendala'];
    $deskripsi = $_POST['deskripsi'];
    $tanggalAduan = date('Y-m-d H:i:s');
    $file_name = $_FILES['image']['name'];

    $sql = "INSERT INTO status_layanan (id_user, kendala, deskripsi, gambar, tanggal) VALUES ('" . $_SESSION['data']['id_user'] . "', '" . $kendala . "', '" . $deskripsi . "', '" . $file_name . "', '" . $tanggalAduan . "')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        $allowed_mime_types = array("image/jpeg", "image/png", "image/jpg");

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];


        $target_directory = "../assets/";

        if (in_array($file_type, $allowed_mime_types)) {
            if ($file_size <= (2 * 1024 * 1024)) {
                $target_file = $target_directory . $file_name; 
                if (move_uploaded_file($file_tmp, $target_file)) { 
                    echo "berhasil";
                    header('Location: index.php');
                } else {
                    echo "Gagal memindahkan file.";
                    header('Location: aksi_home.php');
                }
            } else {
                echo "Ukuran file melebihi 2MB.";
                header('Location: aksi_home.php');
            }
        } else {
            echo "Tipe file tidak didukung.";
            header('Location: aksi_home.php');
        }
    } else {
        echo "Error: " . $koneksi->error;
    }
}
