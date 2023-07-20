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
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Category Name</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->

@endsection
@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                processing: true,
                responsive: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('barang.data') }}'
                },
                columns: [{
                        data: 'select_all'
                    },
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'nama_kategori'
                    },
                    {
                        data: 'nama_merek'
                    },
                    {
                        data: 'stok'
                    },
                    {
                        data: 'image'
                    },

                ]
            });
        }
        )
    </script>
@endpush


