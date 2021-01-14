<?php include '../../config.php';
$id = $_GET["kode"];
$query =  "SELECT * FROM pemasok WHERE KodePemasok = '$id'";
$res = select($query);
$pemasok = mysqli_fetch_assoc($res);
?>

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Delete</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form id="formPemasok" action="" class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <h4>Anda Yakin ingin menghapus data pemasok ini ? </h4>
                </div>
                <blockquote>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Kode</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pemasok['KodePemasok'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Nama</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pemasok['NamaPemasok'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Alamat</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pemasok['AlamatPemasok'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">No. Telp</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pemasok['TeleponPemasok'] ?></p>
                    </div>
                </blockquote>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <a href="#" onclick="deleteData('<?= $pemasok['KodePemasok'] ?>')" class="btn btn-danger" name="submit" id="submit">Delete</a>
                <a href="#" onclick="goToPage('master/pemasok');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
    </div>
</div>
<script src="../assets/js/deletePemasok.js"></script>