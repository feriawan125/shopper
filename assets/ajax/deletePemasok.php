<?php

require_once '../../auth.php';
// include database connection file
include_once("../../config.php");

Authentication::isAuth();
Authentication::isAdmin();

$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
    $id = $data->{"data"};
    if ($data->{"action"} == "delete") {
        deletePemasok($id);
    } elseif ($data->{"action"} == "view") {
        viewPemasok($id);
    }
}

function deletePemasok($id)
{
    $namakolom = "KodePemasok";
    $isikolom = $id;
    $pesanberhasil = "Delete Data Berhasil!";
    $pesangagal = "Delete Data Gagal!";

    // Insert user data into table
    delete("pemasok", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
}

function viewPemasok($id)
{
}
