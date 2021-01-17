<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$data = json_decode(file_get_contents("php://input"));

// delete("hbeli", "KodeBeli", $data -> {'kodeBeli'}, "Delete Berhasil", "Delete Gagal");
update("hjual", array ("void"), array (true), array ("KodeJual"), array ($data -> {'kodeJual'}), "Delete Berhasil", "Delete Gagal");
?>