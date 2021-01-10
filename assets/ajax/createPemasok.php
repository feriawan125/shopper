<?php
// include database connection file
include_once("../../config.php");

$namakolom = array("NamaPemasok", "AlamatPemasok", "TeleponPemasok", "Slug", "CreatedAt");
$isikolom = array(
    htmlspecialchars($_POST['nama']), htmlspecialchars($_POST['alamat']), htmlspecialchars($_POST['telepon']), htmlspecialchars($_POST['slug']), htmlspecialchars(date("Y-m-d h:i:s"))
);
$pesanberhasil = "Input Data Berhasil!";
$pesangagal = "Input Data Gagal!";

// Insert user data into table
insert("pemasok", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
if (isSuccess()) {
    echo 'Input Data Berhasil!';
} else {
    echo '';
}
