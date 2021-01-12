<?php include '../../config.php';
$id = $_GET["kode"];
$query =  "SELECT * FROM users WHERE user_id = '$id'";
$res = select($query);
$pengguna = mysqli_fetch_assoc($res);
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
                    <h4>Anda Yakin ingin menghapus data pengguna ini ? </h4>
                </div>
                <blockquote>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Kode</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pengguna['user_id'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Nama Lengkap</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pengguna['full_name'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Username</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pengguna['username'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Email</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pengguna['email'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">No. Telp</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pengguna['phone'] ?></p>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-1 col-form-p">Akses</p>
                        <p class="col-sm-auto col-form-p">:</p>
                        <p class="col-sm-auto col-form-p"><?= $pengguna['role'] ?></p>
                    </div>
                </blockquote>
            </div>

            <!-- card footer -->
            <div class="card-footer">
                <a href="" class="btn btn-danger">Delete</a>
                <a href="#" onclick="goToPage('master/pengguna');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
    </div>
</div>