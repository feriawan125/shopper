<?php include '../../config.php' ?>
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
                        <p class="col-sm-auto col-form-p"></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Nama</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Stok</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Harga Beli</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Harga Jual</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Slug</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"></p>
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