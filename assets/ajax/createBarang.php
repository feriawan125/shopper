<?php
// include database connection file
include_once("../../config.php");

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
    echo 'OK';
} else {
    echo '';
}
