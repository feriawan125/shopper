<?php

require_once '../../auth.php';
// include database connection file
include_once("../../config.php");

Authentication::isAuth();
Authentication::isAdmin();

$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
    $dataPemasok = $data->{"data"};
    if ($data->{"action"} == "update") {
        editPemasok($dataPemasok[0]);
    }
}

function editPemasok($dataPemasok)
{
    $wherekolom = array('KodePemasok');
    $isiwhere = array($dataPemasok->{'kodePemasok'});
    $namakolom = array('NamaPemasok', 'AlamatPemasok', 'TeleponPemasok', 'Slug');
    $isikolom = array($dataPemasok->{'namaPemasok'}, $dataPemasok->{'alamatPemasok'}, $dataPemasok->{'teleponPemasok'}, $dataPemasok->{'slugPemasok'});
    $pesanberhasil = "Update Data Berhasil!";
    $pesangagal = "Update Data Gagal!";

    // Insert user data into table
    update("pemasok", $namakolom, $isikolom, $wherekolom, $isiwhere, $pesanberhasil, $pesangagal);
}
