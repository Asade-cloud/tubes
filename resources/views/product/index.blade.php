@extends('layouts.master')
@section('title')
    Product
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Product</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button onclick="addForm('{{ route('product.store') }}')" class="btn btn-primary btn-sm"><i
                        class="fas fa-plus"></i> Tambah</button>
                <button onclick="deleteSelected('{{ route('product.delete_selected') }}')" class="btn btn-danger btn-sm"><i
                        class="fas fa-trash"></i> Delete</button>
                <button onclick="printBarcode('{{ route('product.print_barcode') }}')" class="btn btn-info btn-sm"><i
                        class="fas fa-barcode"></i> Barcode</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" method="post" class="form-product">
                    @csrf
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="select_all" id="select_all"></th>
                                <th width="5%">No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Purchase Price</th>
                                <th>Selling Price</th>
                                <th>Discount</th>
                                <th>Stock</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                    </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    @includeIf('product.form')
@endsection


@push('scripts')
    <script>
        let table;

        $(function() {
            table = $('.table').DataTable({
                processing: true,
                responsive: true,
                // lengthChange: false,
                autoWidth: false,
                // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
                ajax: {
                    url: '{{ route('product.data') }}'
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
                        data: 'code'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'brand'
                    },
                    {
                        data: 'purchase_price'
                    },
                    {
                        data: 'selling_price'
                    },
                    {
                        data: 'discount'
                    },
                    {
                        data: 'stock'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        sortable: false
                    },
                ]
            });
        }
    </script>
@endpush
