<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$data = json_decode(file_get_contents("php://input"));

$namaKolom = array("KodeBeli", "TotalBeli", "KodePengguna");
$isiKolom = array($data -> {'txId'}, $data -> {'total'}, Authentication::getUid());
insert("hbeli", $namaKolom, $isiKolom, "", "");

foreach ($data -> {'cart'} as $cart) {
  $namaKolom = array("KodeBeli", "KodePemasok", "KodeBarang", "Subtotal");
  $isiKolom = array($data -> {'txId'}, $data -> {'pemasok'}, $cart ->{'Kode'}, $cart -> {'Subtotal'});
  insert("dbeli", $namaKolom, $isiKolom, "", "");
}




// if (isSuccess()) {
//   echo 'Transaksi Berhasil';
// }else {
//   echo 'Transaksi Gagal';
// }

// object(stdClass)#2 (4) {
//   ["txId"]=>
//   string(9) "202101151"
//   ["pemasok"]=>
//   int(1)
//   ["total"]=>
//   int(2512)
//   ["cart"]=>
//   array(2) {
//     [0]=>
//     object(stdClass)#4 (5) {
//       ["Kode"]=>
//       string(2) "16"
//       ["Nama Barang"]=>
//       string(4) "abcd"
//       ["Kuantitas"]=>
//       string(1) "1"
//       ["Harga Beli"]=>
//       string(2) "12"
//       ["Subtotal"]=>
//       string(2) "12"
//     }
//     [1]=>
//     object(stdClass)#5 (5) {
//       ["Kode"]=>
//       string(2) "10"
//       ["Nama Barang"]=>
//       string(18) "Le Minerale 600ML "
//       ["Kuantitas"]=>
//       string(1) "1"
//       ["Harga Beli"]=>
//       string(4) "2500"
//       ["Subtotal"]=>
//       string(4) "2500"
//     }
//   }
// }


?>

