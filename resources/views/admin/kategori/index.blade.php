@extends('admin.layoutsAdmin.app')
@section('title', 'Kategori Tanaman')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    <div class="card-body">


                        <a href="kategori/create" class="btn btn-danger"><i class="fas fa-plus"></i> Data Baru</a>
                        <hr>
                        @include('admin.alert')
                        <table class="table table-bordered" id="kategori-tables">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
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
            $('#kategori-tables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/kategori/json',
                columns: [{
                        data: 'nama_kategori',
                        name: 'nama_kategori'
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
