<?php

require_once '../auth.php';
include_once '../config.php';
// include database connection file
Authentication::isAuth();
Authentication::isStaff();
$date = date("Ymd");
$queryNum = "SELECT COUNT(TanggalBeli) AS counter from hbeli WHERE TanggalBeli >= NOW() - INTERVAL 1 DAY";
$num = select($queryNum);
$num = mysqli_fetch_assoc($num)['counter'] + 1;
$txId = $date . $num

?>

<link rel="stylesheet" href="../assets/css/pembelian.css">

<!-- TEMPLATE MASTER BARANG -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pembelian</h1>
            </div>
        </div>
    </div>
</section>

<!-- TOP CARD -->
<div class="card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- LEFT SIDE -->
                <div class="col-6">
                    <div class="row invoice-info">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nogenerate" class="col-lg-2 col-form-label">No Generate</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="txId" name="" value="<?=$txId ?>" placeholder="No Generate" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="refrensi" class="col-sm-2 col-form-label">Refrensi</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" name="" placeholder="Refrensi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="datePicker" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

                <!-- RIGHT SIDE -->
                <div class="col-6">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="pemasok" class="col-sm-2 col-form-label">Pemasok</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="idPemasok" name="" placeholder="Kode" disabled>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="namaPemasok" name="" placeholder="Nama" disabled>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-block bg-gradient-secondary" data-toggle="modal" data-target="#modal-pemasok" onclick="getPemasok()">Cari</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="alamatPemasok" name="" rows="4" cols="50" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<!-- BOTTOM CARD -->
<div class="card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- LEFT SIDE -->
                <div class="col-3">
                    <div class="row invoice-info">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nogenerate" class="col-sm-3 col-form-label">Barang</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="kodeBarang" name="" placeholder="Kode" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-block bg-gradient-secondary" data-toggle="modal" data-target="#modal-barang" onclick="getBarang()">Cari</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="namaBarang" name="" placeholder="Nama" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hargabeli" class="col-sm-3 col-form-label">Harga Beli</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="hargaBeli" name="" placeholder="0" disabled>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kuantitas" class="col-sm-3 col-form-label">Kuantitas</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="kuantitas" name="" value="1" min="1">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-block bg-gradient-blue" onclick="addToCart()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

                <!-- RIGHT SIDE -->
                <div class="col-9">
                    <br>
                    <div class="card">
                        <div class="col-12">
                            <div class="table-responsive" id="cartList" onload="buildCartList()"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-default float-right" style="margin-right: 5px; min-width:150px"><i class="fas fa-print"></i> Print</button>
                    <button type="button" class="btn btn-danger float-right" style="margin-right: 5px; min-width:150px" data-toggle="modal" data-target="#modal-hapus"><i class=" fas fa-search"></i> Hapus</button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px; min-width:150px" onclick="save()"><i class=" fas fa-save"></i> Simpan </button>
                    <button type="button" class="btn btn-warning float-right" style="margin-right: 5px; min-width:150px" data-toggle="modal" data-target="#modal-nota" onclick="getNota();"><i class=" fas fa-search"></i> Cari Nota</button>
                </div>
            </div>
            <br>
    </section>
</div>

<div class="modal fade" id="modal-pemasok">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pemasok</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <div class="table-responsive" id="tabelPemasok"></div>
            </div>

            <div class="modal-footer justify-content-between">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-barang">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <div class="table-responsive" id="tabelBarang"></div>

            </div>

            <div class="modal-footer justify-content-between">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-nota">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nota Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <div id="tabelNota"></div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Anda Yakin Mau Menghapus data ini ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <!-- SHOW DATA -->
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/pembelian.js"></script>
<script>
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
    });
    document.getElementById('datePicker').value = new Date().toDateInputValue();

</script>