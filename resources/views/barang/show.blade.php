@extends('layouts.master')
@section('title')
    Product
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Barang</li>
@endsection

@section('content')
<div class="container-sm my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-4 border">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Detail Employee</h4>
            </div>
            <hr>
            <div class="row">

                <div class="col-md-12 mb-3">
                    <label for="nama_barang" class="form-label">Last Name</label>
                    <h5>{{ $barang->nama_barang }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <h5>{{ $barang->kategori->nama_kategori }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                    <h5>{{ $barang->merek->nama_merek }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nama_satuan" class="form-label">Nama Satuan Barang</label>
                    <h5>{{ $barang->stok }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="nama_satuan" class="form-label">Nama Satuan Barang</label>
                    <img src="{{ $barang->image }}" alt="500px">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-grid">
                    <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                            class="bi-arrow-left-circle me-2"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


