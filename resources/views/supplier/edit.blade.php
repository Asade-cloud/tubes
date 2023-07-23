@extends('layouts.master')
@section('title')
    Supplier
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$pageTitle}}</li>
@endsection

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-12">
                <div class="mb-3 text-center">
                <h4>Edit Data Supplier</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama Supplier</label>
                        <input class="form-control" type="text" name="nama" id="nama"
                        value="{{ $supplier->nama }}" placeholder="Nama">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" type="text" name="alamat" id="alamat"
                        value="{{ $supplier->alamat }}" placeholder="Alamat">
                        @error('alamat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email"
                        value="{{ $supplier->email }}" placeholder="Email">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telepon" class="form-label">No Telepon</label>
                        <input class="form-control" type="number" name="telepon" id="telepon"
                        value="{{ $supplier->telepon }}" placeholder="Telepon">
                        @error('telepon')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('supplier.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                class="bi-arrow-left-circle me-2"></i> Cancel</a>
                    </div>
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection


