@extends('admin.layoutsAdmin.app')
@section('title', 'Pesanan Terkirim')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        @include('alert')
                        <table class="table table-border" id="tables-pesananDikirim">
                            <thead>
                                <tr>
                                    <th>No. Pesanan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $('#tables-pesananDikirim').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/pesanan/jsonPesananDikirim',
                columns: [{
                        data: 'uuid_pesan',
                        name: 'uuid_pesan'
                    }
                ],
                "drawCallback": function(settings) {
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
            });
        });

    </script>
@endpush
