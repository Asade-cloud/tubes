@extends('layouts.master')
@section('title')
    Product
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Barang</li>
@endsection

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-12">
                <div class="mb-3 text-center">
                <h4>Edit Barang</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input class="form-control" type="text" name="nama_barang" id="nama_barang"
                            value="{{ $barang->nama_barang }}" >
                        @error('nama_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="merek" class="form-label">Merek Barang</label>
                        <select name="merek" id="merek" class="form-control">
                            @php
                            $selected = '';
                            if ($errors->any()) {
                                $selected = old('merek');
                            } else {
                                $selected = $barang->merek_id;
                            }
                        @endphp
                        @foreach ($merek as $merek)
                            <option value="{{ $merek->id }}" {{ $selected == $merek->id ? 'selected' : '' }}>
                                {{ $merek->nama_merek }}</option>
                        @endforeach
                        </select>
                        @error('deskripsi_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                        @error('merek')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                     <div class="col-md-6 mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            @php
                            $selected = '';
                            if ($errors->any()) {
                                $selected = old('kategori');
                            } else {
                                $selected = $barang->kategori_id;
                            }
                        @endphp
                        @foreach ($kategori as $kategori)
                            <option value="{{ $kategori->id }}" {{ $selected == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input class="form-control" type="text" name="stok" id="stok"
                            value="{{ $barang->stok }}">
                        @error('stok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input class="form-control" type="file" name="image" id="image">

                        @if ($barang->image)
                        <img src="{{ asset('storage/' . $barang->image) }}" alt="" style="max-height: 200px;">
                        @endif

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
    </form>
</div>
    @includeIf('barang.form')
@endsection


