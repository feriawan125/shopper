<?php

include '../../config.php';

$id = $_GET["kode"];
$query =  "SELECT * FROM barang WHERE KodeBarang = '$id'";
$res = select($query);
$barang = mysqli_fetch_assoc($res);
// $results = getAllById('barang', $id, 'KodeBarang');
// $result = $results[0];
// var_dump($result);
?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title text-thead-dark">Edit Master Barang</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form action="" class="form-horizontal" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?=$id?>" class="form-control" id="kode" name="kode" readonly>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?=$barang['NamaBarang']?>" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok-barang" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <input type="number" value="<?=$barang['StokBarang']?>" class="form-control" id="stok-barang" name="stok-barang" readonly>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga-beli" class="col-sm-2 col-form-label">Harga Beli</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img alt="Rp.">
                                </span>
                            </div>
                            <input type="text" value="<?=$barang['HargaBeli']?>" class="form-control" id="harga-beli" name="harga-beli" data-type="currency">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga-jual" class="col-sm-2 col-form-label">Harga Jual</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img alt="Rp.">
                                </span>
                            </div>
                            <input type="text" value="<?=$barang['HargaJual']?>" class="form-control" id="harga-jual" name="harga-jual">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label> <!-- Slug adalah nama samaran yang berguna untuk url-->
                    <div class="col-sm-10">
                        <input type="text" value="<?=$barang['Slug']?>" class="form-control" id="slug" name="slug">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="#" onclick="goToPage('master/barang');" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
</div>