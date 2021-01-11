<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$query = "SELECT KodePemasok, NamaPemasok, AlamatPemasok, TeleponPemasok, Slug FROM pemasok";
$res = select($query);
$data = mysqli_fetch_all($res, MYSQLI_ASSOC);
header('Content-Type: application/json');
echo json_encode($data);
?>