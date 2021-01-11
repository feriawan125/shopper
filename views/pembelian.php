<?php 

require_once '../auth.php';
// include database connection file
Authentication::isAuth();
Authentication::isStaff();
?>

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
                                    <input type="text" class="form-control" id="" name="" placeholder="No Generate">
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
                                    <input type="date" class="form-control" id="" name="">
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
                                    <input type="text" class="form-control" id="" name="" placeholder="Kode">
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-block bg-gradient-secondary" data-toggle="modal" data-target="#modal-barang">Cari</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="" name="" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hargabeli" class="col-sm-3 col-form-label">Harga Beli</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="" name="" placeholder="0">
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
                                        <input type="text" class="form-control" id="" name="" placeholder="0">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-block bg-gradient-blue">Tambah</button>
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="min-width:50px">Kode</th>
                                        <th style="min-width:150px">Nama Barang</th>
                                        <th style="min-width:50px">Kuantitas</th>
                                        <th style="min-width:100px">Harga Beli</th>
                                        <th style="min-width:100px">Subtotal</th>
                                        <th style="min-width:25px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="min-width:50px">1</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">2</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">3</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">4</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">5</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">6</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">7</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">8</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="min-width:50px">9</th>
                                        <th style="min-width:150px">Call of Duty</th>
                                        <th style="min-width:50px">100</th>
                                        <th style="min-width:100px">10000</th>
                                        <th style="min-width:100px">Rp. 1000000</th>
                                        <th style="min-width:25px">
                                            <a href="" class="btn btn-block bg-gradient-danger btn-xs text-white">
                                                Delete
                                            </a>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button type="button" class="btn btn-default float-right" style="margin-right: 5px; min-width:150px"><i class="fas fa-print"></i> Print</button>
                    <button type="button" class="btn btn-danger float-right" style="margin-right: 5px; min-width:150px" data-toggle="modal" data-target="#modal-hapus"><i class=" fas fa-search"></i> Hapus</button>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px; min-width:150px" data-toggle="modal" data-target="#modal-simpanberhasil"><i class=" fas fa-save"></i> Simpan </button>
                    <button type="button" class="btn btn-warning float-right" style="margin-right: 5px; min-width:150px" data-toggle="modal" data-target="#modal-nota"><i class=" fas fa-search"></i> Cari Nota</button>
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
                <div id="tabelPemasok"></div>
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
                <h4 class="modal-title">Nota Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-simpanberhasil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <h6>Penyimpanan Berhasil</h6>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-simpangagal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Failed</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!-- CONTENT HERE -->
                <h6>Penyimpanan Gagal</h6>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
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