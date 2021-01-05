<!-- INCLUDE TEMPLATE -->

<!-- INCLUDE CONTENT -->


<!-- TEMPLATE MASTER PEMASOK -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Master Pemasok</h3>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">Kode Pemasok</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama Pemasok</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Alamat Pemasok</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Telepon Pemasok</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php ?>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><?= $p['KodePemasok']; ?></td>
                                <td class="text-left">
                                    <? ?>
                                </td>
                                <td class="text-left">
                                    <? ?>
                                </td>
                                <td class="text-right">
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