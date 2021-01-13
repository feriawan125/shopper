<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$data = json_decode(file_get_contents("php://input"));
// $query = "SELECT KodeBarang, NamaBarang, StokBarang, HargaBeli, HargaJual, Slug FROM barang";
// $res = select($query);
// $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
// header('Content-Type: application/json');
// echo json_encode($data);
var_dump($data);
// $numItems = count($arr);
// $i = 0;
// foreach($arr as $key=>$value) {
//   if(++$i === $numItems) {
//     echo "last index!";
//   }
// } 
?>