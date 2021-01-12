<?php

include '../../config.php';

$id = $_GET["kode"];
$query =  "SELECT * FROM users WHERE user_id = '$id'";
$res = select($query);
$pengguna = mysqli_fetch_assoc($res);

?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title text-thead-dark">Edit Master Pengguna</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form action="" class="form-horizontal" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $id ?>" class="form-control" id="kode" name="kode" value="" readonly>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pengguna['username'] ?>" class="form-control" id="username" name="username" value="" readonly>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" value="<?= $pengguna['password_hash'] ?>" class="form-control" id="password" name="password" value="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" value="<?= $pengguna['email'] ?>" class="form-control" id="email" name="email" value="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pengguna['full_name'] ?>" class="form-control" id="fullname" name="fullname" value="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" value="<?= $pengguna['phone'] ?>" class="form-control" id="telepon" name="telepon" value="">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label label for="akses" class="col-sm-2 col-form-label">Akses</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="akses">
                            <option value="admin" <?php if ($pengguna['role'] == "admin") echo 'selected="selected"'; ?> id="akses" name="akses">admin</option>
                            <option value="staff" <?php if ($pengguna['role'] == "staff") echo 'selected="selected"'; ?> id="akses" name="akses">staff</option>
                            <option value="staff" <?php if ($pengguna['role'] == "kasir") echo 'selected="selected"'; ?> id="akses" name="akses">kasir</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update</button>
                <a href="#" onclick="goToPage('master/pengguna');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
    </div>
</div>