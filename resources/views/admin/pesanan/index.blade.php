@extends('admin.layoutsAdmin.app')
@section('title', 'Pesanan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    <div class="card-body">


                        <hr>
                        @include('admin.alert')
                        <table class="table table-bordered" id="pesanan-tables">
                            <thead>
                                <tr>
                                    <th>No. Pesanan</th>
                                    <th>No. Konfirmasi</th>
                                    <th width=50px>Action</th>
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
            $('#pesanan-tables').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/pesanan/json',
                columns: [{
                        data: 'uuid_pesan',
                        name: 'uuid_pesan'
                    },
                    {
                        data: 'uuid_konfirmasi',
                        name: 'uuid_konfirmasi'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                "drawCallback": function(settings) {
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
            });
        });

    </script>
    <script>
        $('body').tooltip({
            selector: '[data-bs-toggle="tooltip"]'
        });

    </script>
@endpush
