<?php
include "../koneksi/koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$nm_lengkap = $_POST['nm_lengkap'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$level = 'user';
$sql = "INSERT INTO register (username, password, nm_lengkap, email, no_hp, alamat, level) VALUES ('" . $user . "', '" . $psw . "', '" . $nm_lengkap . "', '" . $email . "', '" . $nohp . "', '" . $alamat . "', '" . $level . "')";
$query = $koneksi->query($sql);
if ($query === true) {
    header('location: ../form/form_login.php');
} else {
    echo "errorr";
}