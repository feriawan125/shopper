<?php

require_once '../../auth.php';
// include database connection file
include_once("../../config.php");

Authentication::isAuth();
Authentication::isAdmin();

$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
    $dataBarang = $data->{"data"};
    if ($data->{"action"} == "update") {
        editBarang($dataBarang[0]);
    }
}

function editBarang($dataBarang){
    $wherekolom = array('KodeBarang');
    $isiwhere = array($dataBarang->{'kodeBarang'});
    $namakolom = array('NamaBarang', 'HargaBeli', 'HargaJual', 'Slug');
    $isikolom = array($dataBarang->{'namaBarang'}, $dataBarang->{'hargaBeli'}, $dataBarang->{'hargaJual'}, $dataBarang->{'slug'});
    $pesanberhasil = "Update Data Berhasil!";
    $pesangagal = "Update Data Gagal!";
        
    // Insert user data into table
    update("barang", $namakolom, $isikolom, $wherekolom, $isiwhere, $pesanberhasil, $pesangagal);
}