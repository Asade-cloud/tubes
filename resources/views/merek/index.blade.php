@extends('layouts.master')
@section('title')
    Merek
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('merek.create') }}" class="btn btn-primary">Tambah Merek</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <form method="get" action="/mereksearch">
                            <div class="input-group">
                                <input class="form-control" name="search" placeholder="search..." value="{{ isset($search) ? $search : ''}}" autocomplete="off">
                                <button type="submit" class="btn btn-primary">search</button>
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
                                <th>Nama Merek</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mereks as $merek)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $merek->nama_merek }}</td>
                                    <td>@include('merek.action')</td>

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


