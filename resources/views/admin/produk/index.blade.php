@extends('admin.layoutsAdmin.app')
@section('title', 'Produk Tanaman')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    <div class="card-body">


                        <a href="produk/create" class="btn btn-danger"><i class="fas fa-plus"></i> Data Baru</a>
                        <hr>
                        @include('admin.alert')
                        <table class="table table-bordered" id="produk-tables">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th width=50>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#produk-tables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/produk/json',
                columns: [{
                        data: 'nama_produk',
                        name: 'nama_produk'
                    },
                    {
                        data: 'harga_produk',
                        name: 'harga_produk'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });

    </script>
@endpush
