@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$barangs}}</h3>
                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-easel"></i>
                    </div>
                    <a href="{{route('barang.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$kategoris}}</h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="{{route('kategori.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$suppliers}}</h3>
                        <p>Supplier</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-map"></i>
                    </div>
                    <a href="{{route('supplier.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$mereks}}</h3>
                        <p>Merek</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-folder"></i>
                    </div>
                    <a href="{{route('merek.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <a href="{{route('barangmasuk.index')}}">
                <h3> Data Barang Masuk</h3>
                </a>
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Nama Supplier</th>
                                <th>Stok</th>
                                <th>Tanggal</th>
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
                            </tbody>
                        @endforeach
                        </tbody>
                </table>

                <table class="table table-bordered table-striped">
                <a href="{{route('barangkeluar.index')}}">
                <h3> Data Barang Keluar</h3>
                </a>
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangkeluars as $barangkeluar)
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barangkeluar->barang->nama_barang}}</td>
                                <td>{{ $barangkeluar->stok }}</td>
                                <td>{{ $barangkeluar->created_at }}</td>
                            </tbody>
                        @endforeach
                        </tbody>
                </table>
            <!-- ./col -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
