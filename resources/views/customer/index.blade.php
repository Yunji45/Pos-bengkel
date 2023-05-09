@extends('template.layout')
@section('konten')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaksi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="">Dashboard</a></li>
                            <li class="active">Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-services-tab" data-toggle="tab" href="#nav-services" role="tab" aria-controls="nav-services" aria-selected="true">Services</a>
                                    <a class="nav-item nav-link" id="nav-sparepart-tab" data-toggle="tab" href="#nav-sparepart" role="tab" aria-controls="nav-sparepart" aria-selected="false">Sparepart</a>
                                </div>
                            </nav>
                            <div class="tab-content pt-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-services" role="tabpanel" aria-labelledby="nav-services-tab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">

                    <div class="card" id="customerContainer"  style="display:none;background:#000">
                        <div class="card-header">
                            <b>Data Pelanggan</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" name="customer" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>No. Plat</label>
                                <input type="text" name="plat" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="card" id="serviceCartContainer" style="display:none">
                        <div class="card-header">
                            <b>Services</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered" id="serviceCart">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card" id="sparepartCartContainer" style="display:none">
                        <div class="card-header">
                            <b>Sparepart</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered" id="sparepartCart">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th class="text-center">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Detail Pembayaran</b>
                        </div>
                        <div class="card-body">
                            <div style="border-bottom: 1px dashed #aaa" class="d-flex py-2">
                                <span>Total</span>
                                <span class="total ml-auto">Rp. 0</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-4" style="box-sizing:border-box">
                        <div class="col-6 p-0 pr-1">
                            <button type="button" class="btn btn-secondary btn-block" onclick="reset()">Batal</button>
                        </div>
                        <div class="col-6 p-0 pl-1">
                            <button type="button" class="btn btn-primary btn-block" onclick="saveModal()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Bayar</label>
                            <input type="text" id="money" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kembalian</label>
                            <input type="text" id="change" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-save-confirm" disabled>Lanjutkan</button>
                    </div>
                </div>
            </div>
        </div>

@endsection