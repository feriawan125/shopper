<?php

require_once '../../auth.php';
// include database connection file
include_once("../../config.php");

Authentication::isAuth();
Authentication::isAdmin();

$id = $_POST["kode"];
$namakolom = array("KodeBarang");
$isikolom = array(htmlspecialchars($id));
$pesanberhasil = "Delete Data Berhasil!";
$pesangagal = "Delete Data Gagal!";

// Insert user data into table
delete("barang", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
if (isSuccess()) {
    echo 'Delete Data Berhasil!';
} else {
    echo '';
}
