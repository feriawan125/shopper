<?php 
require_once '../../auth.php';
include_once '../../config.php';
Authentication::isAuth();
Authentication::isStaff();
$data = json_decode(file_get_contents("php://input"));

// delete("hbeli", "KodeBeli", $data -> {'kodeBeli'}, "Delete Berhasil", "Delete Gagal");
update("hbeli", array ("void"), array (true), array ("KodeBeli"), array ($data -> {'kodeBeli'}), "Delete Berhasil", "Delete Gagal");
?>