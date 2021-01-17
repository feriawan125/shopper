<?php
require_once '../auth.php';
include_once '../config.php';
// include database connection file
Authentication::isAuth();
Authentication::isKasir();
$token = $_COOKIE['token'];
$date = date("Ymd");
$queryNum = "SELECT COUNT(TanggalJual) AS counter from hjual WHERE DATE(TanggalJual) = CURDATE()";
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
                <h1>Penjualan</h1>
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
                                <label for="nogenerate" class="col-sm-2 col-form-label">No Nota</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="txId" name="" placeholder="No Generate" value="<?=$txId?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="datePicker" name="" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row invoice-info">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nogenerate" class="col-sm-2 col-form-label">Operator</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="" name="" value="<?=Authentication::getUid()?>" disabled>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" name="" value="<?=Authentication::getUserFname()?>" disabled>
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
                <div class="col-4" id="addItemGroup">
                    <div class="row invoice-info">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nogenerate" class="col-md-4 col-form-label">Barang</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="kodeBarang" name="" placeholder="Kode">
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-block bg-gradient-secondary" data-toggle="modal" data-target="#modal-barang" onclick="getBarang();">Cari</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="namaBarang" name="" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hargabeli" class="col-md-4 col-form-label">Harga Jual</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="hargaJual" name="" placeholder="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kuantitas" class="col-md-4 col-form-label">Kuantitas</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="kuantitas" name="" placeholder="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm">
                                    <button type="button" class="btn btn-block bg-gradient-blue" onclick="addToCart();">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->

                <!-- RIGHT SIDE -->
                <div class="col">
                    <br>
                    <div class="card">
                        <div class="col-12">
                            <div class="table-responsive" id="cartList"></div>
                            <h3>Total: Rp <span id="txtTotal">0</span></h3>                        
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-default float-right" style="margin-right: 5px; min-width:150px"><i class="fas fa-print"></i> Print</button>
                    <?php if(Authentication::getUserRole($token) == 'staff' || Authentication::getUserRole($token) == 'admin'): ?>
                    <button type="button" class="btn btn-danger float-right d-none" style="margin-right: 5px; min-width:150px" onclick="delNotaPenjualan();" id="btnDelete"><i class=" fas fa-search"></i> Hapus</button>
                    <?php endif; ?>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px; min-width:150px" id="btnSave" onclick="save();"><i class="fas fa-save"></i> Simpan </button>
                    <button type="button" class="btn btn-warning float-right" style="margin-right: 5px; min-width:150px" data-toggle="modal" data-target="#modal-nota" onclick="getNotaPenjualan();"><i class=" fas fa-search"></i> Cari Nota</button>
                    <button type="button" class="btn btn-info float-right" style="margin-right: 5px; min-width:150px;" onclick="resetPenjualan();"><i class=" fas fa-redo"></i> Reset Form</button>
                </div>
            </div>
            <br>
        </div>

    </section>
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
                <div id="tabelBarang"></div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-nota">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nota Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <div id="tabelNotaPenjualan"></div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/penjualan.js"></script>
<script>
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
    });
    document.getElementById('datePicker').value = new Date().toDateInputValue();

</script>