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
        deleteBarang($id);
    }elseif ($data->{"action"} == "view") {
        viewBarang($id);
    }
}

function deleteBarang($id){
    $namakolom = "KodeBarang";
    $isikolom = $id;
    $pesanberhasil = "Delete Data Berhasil!";
    $pesangagal = "Delete Data Gagal!";
    
    // Insert user data into table
    delete("barang", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
}

function viewBarang($id)
{

}