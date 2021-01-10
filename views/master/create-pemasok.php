<?php include_once '../../config.php' ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Master Pemasok</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form action="master/create-pemasok.php" class="form-horizontal" method="post">
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

            <!-- card footer -->
            <div class="card-footer">
                <input type="submit" name="Submit" class="btn btn-info" value="Save">
                <a href="#" onclick="goToPage('master/pemasok');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
        <?php
        if (isset($_POST['Submit'])) {
            $namakolom = array("", "", "", "", "", "");
            $isikolom = array();
            $pesanberhasil = "Input Data Berhasil!";
            $pesangagal = "Input Data Gagal!";

            // include database connection file
            include_once("../../config.php");

            // Insert user data into table
            insert("pemasok", $namakolom, $isikolom, $pesanberhasil, $pesangagal);
        }
        ?>
    </div>
</div>