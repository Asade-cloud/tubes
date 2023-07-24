@extends('layouts.master')
@section('title')
    Kategori
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$pageTitle}}</li>
@endsection

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('kategori.store') }}" method="POST" >
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-12">

                <div class="mb-3 text-center">
                    <h4>Input Kategori</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input class="form-control" type="text" name="nama_kategori" id="nama_kategori"
                            value="{{ old('nama_kategori') }}" placeholder="Nama Kategori">
                        @error('nama_kategori')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('kategori.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
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


