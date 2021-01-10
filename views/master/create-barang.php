<?php 
require '../../auth.php';
Authentication::isAuth();
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Master Barang</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form id="formBarang" action="" class="form-horizontal" method="post" autocomplete="off">
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="nama" name="nama" autofocus>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok-barang" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="number" class="form-control" id="stok-barang" name="stok-barang" value="0" readonly>
                            <div class="invalid-feedback">

                            </div>
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
                            <input type="number" class="form-control" id="harga-beli" name="harga-beli" value="0">
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
                            <input type="number" class="form-control" id="harga-jual" name="harga-jual" value="0">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="slug" name="slug">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Save</button>
                <a href="#" onclick="goToPage('master/barang');" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script src="../assets/js/createBarang.js"></script>