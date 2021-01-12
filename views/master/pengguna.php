<?php include '../../config.php'; ?>

<!-- CEK AKSES -->
<?php
require '../../auth.php';
Authentication::isAuth();
Authentication::isAdmin();
?>

<!-- TEMPLATE MASTER PENGGUNA -->
<div class="card" id="tabelPengguna">
    <div class="card-header">
        <h3 class="card-title">Master Pengguna</h3>
    </div>

    <div class="card-body">
        <!-- UP THE TABLE -->
        <div class="row">
            <!-- BUTTON TAMBAH DATA -->
            <div class="col-md-5">
                <div class="col-sm-2 col-md-2 row-md4">
                    <div class="dataTables_length" id="example1_length">
                        <br>
                        <a href="#" onclick="goToPage('master/create-pengguna');" class="btn btn-block bg-gradient-primary text-white" style="float: left;width: 135px;">
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <!-- TABLE -->
        <div class="row">
            <div class="table-responsive col-sm-12">
                <table id="dataTable" class="table table-bordered text-center">
                    <!-- HEADER -->
                    <thead>
                        <tr>
                            <th>Kode Pengguna</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Akses</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!-- BODY -->
                    <tbody>
                        <!-- PILIH & LOOPING DATA -->
                        <?php $query = "SELECT user_id as 'Kode Pengguna', username as 'Username', email as 'Email', phone as 'Telepon', role as 'Akses' FROM users";
                        $data = select($query);
                        foreach ($data as $row) : ?>
                            <tr>
                                <td id='kode' name='kode'><?= $row['Kode Pengguna'] ?></td>
                                <td class='text-left'> <?= $row['Username'] ?></td>
                                <td class='text-left'> <?= $row['Email'] ?></td>
                                <td class='text-right'> <?= $row['Telepon'] ?></td>
                                <td> <?= $row['Akses'] ?></td>
                                <td>
                                    <a class='btn btn-block bg-gradient-warning btn-xs text-white' onclick="editPengguna('<?= $row['Kode Pengguna'] ?>')">Edit</a>
                                    <a href='#' class='btn btn-block bg-gradient-danger btn-xs text-white' onclick="deletePengguna('<?= $row['Kode Pengguna'] ?>')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="divKosong"></div>

<script>
    $(function() {
        $('#dataTable').DataTable();
    });
</script>
<script src="../assets/js/editPengguna.js"></script>
<script src="../assets/js/deletePengguna.js"></script>