@extends('layouts.master')
@section('title')
    Merek
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$pageTitle}}</li>
@endsection

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('merek.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 border col-xl-12">

                <div class="mb-3 text-center">
                    <h4>Input Merek</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_merek" class="form-label">Nama Merek</label>
                        <input class="form-control" type="text" name="nama_merek" id="nama_merek"
                            value="{{ old('nama_merek') }}" placeholder="Nama Merek">
                        @error('nama_merek')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('merek.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
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


