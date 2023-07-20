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
                <a href="{{ route('barangmasuk.create') }}" class="btn btn-primary">Tambah Barang</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form action="" method="post" class="form-product">

                    @csrf
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Stok</th>
                                <th>tanggal</th>

                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangmasuks as $barangmasuk)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barangmasuk->barang->nama_barang}}</td>
                                <td>{{ $barangmasuk->supplier->nama }}</td>
                                <td>{{ $barangmasuk->stok }}</td>
                                <td>{{ $barangmasuk->created_at }}</td>
                                <td>@include('barangmasuk.action')</td>

                            </tbody>
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


