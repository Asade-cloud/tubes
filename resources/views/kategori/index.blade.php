@extends('layouts.master')
@section('title')
    Kategori
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$pageTitle}}</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <form method="get" action="/kategorisearch">
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
                                <th>Nama Kategori</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td>@include('kategori.action')</td>

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


