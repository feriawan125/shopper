<?php include_once '../../config.php' ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Master Pengguna</h3>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form action="master/create-pengguna.php" class="form-horizontal" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="fullname" for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="fullname" name="fullname" autofocus>
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="" id="username" name="username">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" value="" id="password" name="password">
                        <div class="invalid-feedback">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" value="" class="form-control" id="email" name="email" placeholder="testing@gmail.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telepon" class="col-sm-2 col-form-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" value="" class="form-control" id="telepon" name="telepon">
                    </div>
                </div>
                <div class="form-group row">
                    <label label for="akses" class="col-sm-2 col-form-label">Akses</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="akses">
                            <option value="admin" id="akses" name="akses">admin</option>
                            <option value="staff" id="akses" name="akses">staff</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="card-footer">
                <input type="submit" name="Submit" class="btn btn-info" value="Save">
                <a href="#" onclick="goToPage('master/pengguna');" class="btn btn-default float-right">Cancel</a>
            </div>

        </form>
    </div>
</div>