<?php
session_start();
include "../koneksi/koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];
if ($op == "in") {
    $sql = "SELECT * FROM register WHERE username = '$user' AND password = '$psw'";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['data'] = $data;
        if ($data['level'] == "admin" && isset($_SESSION['data'])) {
            header("location:../dashboard/index.php");
        } else if ($data['level'] == "user" && isset($_SESSION['data'])) {
            header("location:../home/index.php");
        } else {
            die("Password salah <a href=\"javascript:history.back()\">kembali</a>");
        }
    }
} else if ($op == "out") {
    unset($_SESSION['data']);
    header("location: ../form/form_login.php");
}
?>