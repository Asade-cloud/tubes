@extends('layouts.master')
@section('title')
    Product
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Barang</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <form method="get" action="/search">
                            <div class="input-group">
                                <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : ''}}" autocomplete="off">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                    </div>
                </div>
                <form action="" method="post" class="form-product">

                    @csrf
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Merek</th>
                                <th>Stok</th>
                                <th>Image</th>

                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->kategori->nama_kategori }}</td>
                                    <td>{{ $barang->merek->nama_merek }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td style=""><img src="{{ asset('storage/' . $barang->image) }}" alt="" style="max-height: 50px;"></td>
                                    <td>@include('barang.action')</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection


