<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$data = json_decode(file_get_contents("php://input"));

$namaKolom = array("KodeBeli", "TotalBeli", "KodePengguna", "KodePemasok", "Refrensi");
$isiKolom = array($data -> {'txId'}, $data -> {'total'}, Authentication::getUid(), $data -> {'pemasok'}, $data -> {'refrensi'});
insert("hbeli", $namaKolom, $isiKolom, "", "");

foreach ($data -> {'cart'} as $cart) {
  $namaKolom = array("KodeBeli", "KodeBarang", "Kuantitas", "HargaBeli", "Subtotal");
  $isiKolom = array($data -> {'txId'},  $cart ->{'Kode'}, $cart -> {'Kuantitas'}, $cart -> {'Harga Beli'}, $cart -> {'Subtotal'});
  insert("dbeli", $namaKolom, $isiKolom, "", "");
}

if (isSuccess()) {
  echo 'Transaksi Berhasil';
}else {
  echo 'Transaksi Gagal';
}
?>