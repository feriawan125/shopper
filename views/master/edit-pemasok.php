<?php

include '../../config.php';

$id = $_GET["kode"];
$query =  "SELECT * FROM pemasok WHERE KodePemasok = '$id'";
$res = select($query);
$pemasok = mysqli_fetch_assoc($res);

?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title text-thead-dark">Edit Master Pemasok</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form action="" class="form-horizontal" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $id ?>" class="form-control" id="kodePemasok" name="kode" value="" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pemasok['NamaPemasok'] ?>" class="form-control" id="namaPemasok" name="nama" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pemasok['AlamatPemasok'] ?>" class="form-control" id="alamatPemasok" name="alamat" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pemasok['TeleponPemasok'] ?>" class="form-control" id="teleponPemasok" name="telepon" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label> <!-- Slug adalah nama samaran yang berguna untuk url-->
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pemasok['Slug'] ?>" class="form-control" id="slugPemasok" name="slug" value="">
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="card-footer">
                    <a href="#" class="btn btn-info" onclick="editPemasok();">Update</a>
                    <a href="#" onclick="goToPage('master/pemasok');" class="btn btn-default float-right">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../assets/js/editPemasok.js"></script>