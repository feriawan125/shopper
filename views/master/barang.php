<?php include '../../config.php' ?>

<!-- CEK AKSES -->
<?php
require '../../auth.php';
Authentication::isAuth();
Authentication::isAdmin();
?>

<!-- TEMPLATE MASTER BARANG -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Master Barang</h3>
    </div>

    <div id="tabelBarang" class="card-body">
        <!-- UP THE TABLE -->
        <div class="row">
            <!-- BUTTON TAMBAH DATA -->
            <div class="col-md-5">
                <div class="col-sm-2 col-md-2 row-md4">
                    <div class="dataTables_length" id="example1_length">
                        <br>
                        <a href="#" onclick="goToPage('master/create-barang');" class="btn btn-block bg-gradient-primary text-white" style="float: left;width: 135px;">
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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok Barang</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $query = "SELECT KodeBarang as 'Kode Barang', NamaBarang as 'Nama Barang', FORMAT(StokBarang,'2') as 'Stok Barang', FORMAT(HargaBeli,'2') as 'Harga Beli', FORMAT(HargaJual,'2') as 'Harga Jual' FROM barang";
                        $data = select($query);
                        foreach ($data as $row) : ?>
                            <tr>
                                <td id='kode' name='kode'><?= $row['Kode Barang'] ?></td>
                                <td class='text-left'> <?= $row['Nama Barang'] ?></td>
                                <td class='text-right'> <?= $row['Stok Barang'] ?></td>
                                <td class='text-right'> <?= $row['Harga Beli'] ?></td>
                                <td class='text-right'> <?= $row['Harga Jual'] ?></td>
                                <td>
                                    <a class='btn btn-block bg-gradient-warning btn-xs text-white' onclick="editBarang('<?= $row['Kode Barang'] ?>')">Edit</a>
                                    <a href='#' class='btn btn-block bg-gradient-danger btn-xs text-white' onclick="goToPage('master/delete-barang');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <span id="hasil"></span>
    </div>
    <div id="divKosong"></div>
</div>

<script>
    $(function() {
        $('#dataTable').DataTable();
    });
</script>
<script src="../assets/js/editBarang.js"></script>
