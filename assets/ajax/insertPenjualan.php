<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isKasir();
$data = json_decode(file_get_contents("php://input"));

$namaKolom = array("KodeJual", "TotalJual", "KodePengguna");
$isiKolom = array($data -> {'txId'}, $data -> {'total'}, Authentication::getUid());
insert("hjual", $namaKolom, $isiKolom, "", "");

foreach ($data -> {'cart'} as $cart) {
  $namaKolom = array("KodeJual", "KodeBarang", "Kuantitas", "HargaJual", "Subtotal");
  $isiKolom = array($data -> {'txId'},  $cart ->{'Kode'}, $cart -> {'Kuantitas'}, $cart -> {'Harga Jual'}, $cart -> {'Subtotal'});
  insert("djual", $namaKolom, $isiKolom, "", "");
}

if (isSuccess()) {
  echo 'Transaksi Berhasil';
}else {
  echo 'Transaksi Gagal';
}
?>