<?php
require '../../auth.php';
Authentication::isAuth();
Authentication::isAdmin();
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Master Pemasok</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form id="formPemasok" action="" class="form-horizontal" method="post" autocomplete="off">
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="nama" name="nama">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="alamat" name="alamat">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="telepon" name="telepon">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="slug" name="slug">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Save</button>
                <a href="#" onclick="goToPage('master/pemasok');" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script src="../assets/js/createPemasok.js"></script>