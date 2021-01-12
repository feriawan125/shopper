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
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <h4>Anda Yakin ingin menghapus data barang ini ? </h4>
                </div>
                <blockquote>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Kode</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $barang['KodeBarang'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Nama</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $barang['NamaBarang'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Stok</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $barang['StokBarang'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Harga Beli</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $barang['HargaBeli'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Harga Jual</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $barang['HargaJual'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Slug</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $barang['Slug'] ?></p>
                    </div>
                </blockquote>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <a href="" class="btn btn-danger">Delete</a>
                <a href="#" onclick="goToPage('master/barang');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
    </div>
</div>