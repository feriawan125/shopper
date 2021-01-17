<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));
if (isset($data->{"action"})) {
  header('Content-Type: application/json');
  switch ($data -> {"action"}) {
    case 'getNotaDetail':
      $kodeBeli = $data -> {'kodeBeli'};
      $query = "SELECT 	dbeli.KodeBarang AS Kode , dbeli.Kuantitas AS Kuantitas, dbeli.Subtotal AS Subtotal, barang.NamaBarang AS 'Nama Barang', dbeli.HargaBeli AS 'Harga Beli'
      FROM dbeli
      INNER JOIN barang ON barang.KodeBarang like dbeli.KodeBarang
      WHERE dbeli.KodeBeli = $kodeBeli";
      $res = select($query);
      $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
      echo json_encode($data);
      break;
    
    case 'getNota':
      $query = "SELECT TanggalBeli, KodeBeli, KodePemasok, TotalBeli FROM hbeli WHERE void = false";
      $res = select($query);
      $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
      echo json_encode($data); 
      break;

    case 'getNotaRetur':
      $query = "SELECT TanggalRetur, KodeRetur, KodeBeli, TotalRetur FROM hretur WHERE void = false";
      $res = select($query);
      $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
      echo json_encode($data); 
      break;

    case 'getNotaReturDetail':
      $kodeRetur = $data -> {'kodeRetur'};
      $query = "SELECT 	dretur.KodeBarang AS Kode , dretur.Kuantitas AS Kuantitas, dretur.Subtotal AS Subtotal, barang.NamaBarang AS 'Nama Barang', barang.HargaBeli AS 'Harga Beli'
      FROM dretur
      INNER JOIN barang ON barang.KodeBarang like dretur.KodeBarang
      WHERE dretur.KodeRetur = $kodeRetur";
      $res = select($query);
      $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
      echo json_encode($data);
      break;
    default:
      break;
  }

}
?>