<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isKasir();
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
  header('Content-Type: application/json');
  switch ($data -> {"action"}) {
    case 'getNotaPenjualanDetail':
      $kodeJual = $data -> {'kodeJual'};
      $query = "SELECT 	djual.KodeBarang AS Kode , djual.Kuantitas AS Kuantitas, djual.Subtotal AS Subtotal, barang.NamaBarang AS 'Nama Barang', djual.HargaJual AS 'Harga Jual'
      FROM djual
      INNER JOIN barang ON barang.KodeBarang like djual.KodeBarang
      WHERE djual.KodeJual = $kodeJual";
      $res = select($query);
      $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
      echo json_encode($data);
      break;
    
    case 'getNotaPenjualan':
      $query = "SELECT TanggalJual, KodeJual, TotalJual FROM hjual WHERE void = false";
      $res = select($query);
      $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
      echo json_encode($data); 
      break;

  }

}
?>