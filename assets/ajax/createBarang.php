<?php
require_once '../../auth.php';
// include database connection file
include_once("../../config.php");

Authentication::isAuth();
Authentication::isAdmin();


$namakolom = array("NamaBarang", "StokBarang", "HargaBeli", "HargaJual", "Slug", "CreatedAt");
$isikolom = array(
    htmlspecialchars($_POST['nama']), htmlspecialchars($_POST['stok-barang']),
    htmlspecialchars($_POST['harga-beli']), htmlspecialchars($_POST['harga-jual']), htmlspecialchars($_POST['slug']), htmlspecialchars(date("Y-m-d h:i:s"))
);
$pesanberhasil = "Input Data Berhasil!";
$pesangagal = "Input Data Gagal!";

// Insert user data into table
insert("barang", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
if (isSuccess()) {
    echo 'Input Data Berhasil!';
} else {
    echo '';
}
?>