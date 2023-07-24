@extends('layouts.master')
@section('title')
    Supplier
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$pageTitle}}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('supplier.create') }}" class="btn btn-primary">Tambah Merek</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <form method="get" action="/suppliersearch">
                            <div class="input-group">
                                <input class="form-control" name="search" type="text" placeholder="Search..." value="{{ isset($search) ? $search : ''}}" autocomplete="off">
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
                                <th>Nama Supplier</th>
                                <th>Alamat </th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $supplier->nama }}</td>
                                    <td>{{ $supplier->alamat }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->telepon }}</td>
                                    <td>@include('supplier.action')</td>
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


