@extends('layouts.master')
@section('title')
    Tambah Barang
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$pageTitle}}</li>
@endsection

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-12">

                <div class="mb-3 text-center">
                    <h4>Input Barang</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input class="form-control" type="text" name="nama_barang" id="nama_barang"
                            value="{{ old('nama_barang') }}" placeholder="Nama Barang">
                        @error('nama_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label">Kategori Barang</label>
                        <select name="kategori" id="kategori" class="form-control">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">
                                    {{ old('kategori') == $kategori->id ? 'selected' : '' }}
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="merek" class="form-label">Merek Barang</label>
                        <select name="merek" id="merek" class="form-control">
                            @foreach ($mereks as $merek)
                                <option value="{{ $merek->id }}">
                                    {{ old('merek') == $merek->id ? 'selected' : '' }}
                                    {{ $merek->nama_merek }}
                                </option>
                            @endforeach
                        </select>
                        @error('merek')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input class="form-control" @error('image')
                        is-invalid @enderror type="file" name="image" id="image">
                        @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('barang.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                class="bi-arrow-left-circle me-2"></i> Cancel</a>
                    </div>
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                            Simpan</button>
                    </div>
                </div>

            </div>
        </div>
@endsection


