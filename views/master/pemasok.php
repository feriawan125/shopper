<?php include '../../config.php' ?>
<!-- TEMPLATE MASTER PEMASOK -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Master Pemasok</h3>
    </div>

    <div class="card-body">
        <!-- UP THE TABLE -->
        <div class="row">
            <!-- BUTTON TAMBAH DATA -->
            <div class="col-md-9">
                <div class="col-sm-2 col-md-2 row-md4">
                    <div class="dataTables_length" id="example1_length">
                        <br>
                        <a href="#" onclick="goToPage('master/create-pemasok');" class="btn btn-block bg-gradient-primary text-white" style="float: left;width: 135px;">
                            Tambah
                        </a>
                    </div>
                </div>
            </div>

            <!-- LENGTH DATA -->
            <div class="col-md-3">
                <div class="dataTables_length" id="example1_length">
                    <br>
                    <div class="input-group input-group-sm" style="float: left;width: 100px;">
                        <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="input-group input-group-sm" style="float: right;width: 275px;">

                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br>

        <!-- TABLE -->
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered text-center" role="grid" aria-describedby="example1_info">
                        <!-- HEADER -->
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Kode Pemasok</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Pemasok</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Alamat Pemasok</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Telepon Pemasok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ?>
                            <tr role="row" class="odd">
                                <?php $query = "SELECT KodePemasok as 'Kode Pemasok', NamaPemasok as 'Nama Pemasok', AlamatPemasok as 'Alamat Pemasok', TeleponPemasok as 'Telepon Pemasok' FROM pemasok";
                                $a = select($query);
                                while ($row = $a->fetch_assoc()) {
                                    echo "<tr role='row' class='odd'>";
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
                            </tr>
                            <?php ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PAGINATION -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate" style="float: right;">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>