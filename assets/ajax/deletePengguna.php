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
        deletePengguna($id);
    } elseif ($data->{"action"} == "view") {
        viewPengguna($id);
    }
}

function deletePengguna($id)
{
    $namakolom = "user_id";
    $isikolom = $id;
    $pesanberhasil = "Delete Data Berhasil!";
    $pesangagal = "Delete Data Gagal!";

    // Insert user data into table
    delete("users", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
}

function viewPengguna($id)
{
}
