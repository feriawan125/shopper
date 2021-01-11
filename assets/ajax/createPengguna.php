<?php
// include database connection file
require_once '../../auth.php';
include_once("../../config.php");
Authentication::isAuth();
Authentication::isAdmin();


$namakolom = array("full_name", "username", "password_hash", "email", "phone", "role");
$isikolom = array(
    htmlspecialchars($_POST['fullname']), htmlspecialchars($_POST['username']), htmlspecialchars(md5($_POST['password'])),
    htmlspecialchars($_POST['email']), htmlspecialchars($_POST['telepon']), htmlspecialchars($_POST['akses'])
);
$pesanberhasil = "Input Data Berhasil!";
$pesangagal = "Input Data Gagal!";

// Insert user data into table
insert("users", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
if (isSuccess()) {
    echo 'Input Data Berhasil!';
} else {
    echo '';
}
?>