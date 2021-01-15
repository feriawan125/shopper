<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
  header('Content-Type: application/json');
  if ($data->{"action"} == "getPemasokDetail") {
    $idPemasok = $data -> {'idPemasok'};
    $query = "SELECT KodePemasok, NamaPemasok, AlamatPemasok, TeleponPemasok, Slug FROM pemasok WHERE KodePemasok = $idPemasok";
    $res = select($query);
    $data = mysqli_fetch_assoc($res);
    echo json_encode($data); 
  }else if ($data->{"action"} == "getPemasok"){
    $query = "SELECT KodePemasok, NamaPemasok, AlamatPemasok, TeleponPemasok, Slug FROM pemasok";
    $res = select($query);
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode($data); 
  }
}
?>