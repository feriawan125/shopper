<?php

require_once '../../auth.php';
// include database connection file
include_once("../../config.php");

Authentication::isAuth();
Authentication::isAdmin();

$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
    $dataPengguna = $data->{"data"};
    if ($data->{"action"} == "update") {
        editPengguna($dataPengguna[0]);
    }
}

function editPengguna($dataPengguna)
{
    $wherekolom = array('user_id');
    $isiwhere = array($dataPengguna->{'kodePengguna'});
    $namakolom = array('username', 'password_hash', 'email', 'full_name', 'phone', 'role');
    $isikolom = array($dataPengguna->{'usernamePengguna'}, md5($dataPengguna->{'passwordPengguna'}), $dataPengguna->{'emailPengguna'}, $dataPengguna->{'fullnamePengguna'}, $dataPengguna->{'teleponPengguna'}, $dataPengguna->{'aksesPengguna'});
    $pesanberhasil = "Update Data Berhasil!";
    $pesangagal = "Update Data Gagal!";

    // Insert user data into table
    update("users", $namakolom, $isikolom, $wherekolom, $isiwhere, $pesanberhasil, $pesangagal);
}
