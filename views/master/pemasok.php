<?php include '../../config.php' ?>
<?php
require '../../auth.php';
Authentication::isAuth();
Authentication::isAdmin();
?>
<!-- TEMPLATE MASTER BARANG -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Master Pemasok</h3>
    </div>

    <div class="card-body">
        <!-- UP THE TABLE -->
        <div class="row">
            <!-- BUTTON TAMBAH DATA -->
            <div class="col-md-5">
                <div class="col-sm-2 col-md-2 row-md4">
                    <div class="dataTables_length" id="example1_length">
                        <br>
                        <a href="#" onclick="goToPage('master/create-pemasok');" class="btn btn-block bg-gradient-primary text-white" style="float: left;width: 135px;">
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
                            <th>Kode Pemasok</th>
                            <th>Nama Pemasok</th>
                            <th>Alamat Pemasok</th>
                            <th>Telepon Pemasok</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $query = "SELECT KodePemasok as 'Kode Pemasok', NamaPemasok as 'Nama Pemasok', AlamatPemasok as 'Alamat Pemasok', TeleponPemasok as 'Telepon Pemasok' FROM pemasok";
                        $a = select($query);
                        while ($row = $a->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['Kode Pemasok'] . "</td>";
                            echo "<td class='text-left'>" . $row['Nama Pemasok'] . "</td>";
                            echo "<td class='text-left  '>" . $row['Alamat Pemasok'] . "</td>";
                            echo "<td class='text-right'>" . $row['Telepon Pemasok'] . "</td>";
                            echo "<td>";
                        ?>
                            <a href='#' class='btn btn-block bg-gradient-warning btn-xs text-white' onclick="goToPage('master/edit-pemasok');">Edit</a>
                            <a href='#' class='btn btn-block bg-gradient-danger btn-xs text-white' onclick="goToPage('master/delete-pemasok');">Delete</a>
                        <?php
                            echo "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#dataTable').DataTable();
    });
</script>