<?php include '../../config.php';
$id = $_GET["kode"];
$query =  "SELECT * FROM barang WHERE KodeBarang = '$id'";
$res = select($query);
$barang = mysqli_fetch_assoc($res);
?>

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Delete</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form id="formBarang" action="" class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <h4>Anda Yakin ingin menghapus data barang ini ? </h4>
                </div>
                <blockquote>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Kode</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p name="kode" class="col-sm-auto col-form-p"><?= $barang['KodeBarang'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Nama</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p name="nama" class="col-sm-auto col-form-p"><?= $barang['NamaBarang'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Stok</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p name="stok" class="col-sm-auto col-form-p"><?= $barang['StokBarang'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Harga Beli</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p name="hargabeli" class="col-sm-auto col-form-p"><?= $barang['HargaBeli'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Harga Jual</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p name="hargajual" class="col-sm-auto col-form-p"><?= $barang['HargaJual'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Slug</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p name="slug" class="col-sm-auto col-form-p"><?= $barang['Slug'] ?></p>
                    </div>
                </blockquote>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <a href="#" onclick="deleteData('<?= $barang['KodeBarang'] ?>')" class="btn btn-danger" name="submit" id="submit">Delete</a>
                <a href="#" onclick="goToPage('master/barang');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
    </div>
</div>
<script src="../assets/js/deleteBarang.js"></script>