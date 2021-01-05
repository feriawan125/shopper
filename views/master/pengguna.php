<!-- INCLUDE TEMPLATE -->

<!-- INCLUDE CONTENT -->


<!-- TEMPLATE MASTER PENGGUNA -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Master Pengguna</h3>
    </div>

    <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-sm-1 col-md-1 row-md4">
            <div class="dataTables_length" id="example1_length">
                <br>
                <a href="" class="btn btn-block bg-gradient-primary text-white">
                    Tambah
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered text-center" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Kode Pengguna</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Username</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Akses</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ?>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><?= $p['user_id']; ?></td>
                                <td>
                                    <? ?>
                                </td>
                                <td>
                                    <? ?>
                                </td>
                                <td>
                                    <? ?>
                                </td>
                                <td>
                                    <? ?>
                                </td>
                                <td><a href="<? ?>" class="btn btn-block bg-gradient-warning btn-xs text-white">
                                        Edit
                                    </a>
                                    <a href="<? ?>" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- AKHIR DARI INCLUDE CONTENT -->