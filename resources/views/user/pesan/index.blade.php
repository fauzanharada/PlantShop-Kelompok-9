@extends('user.layoutsUser.app')
@section('title', 'Pesanan')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        @include('alert')
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Pesanan</th>
                                    <th>No. Konfirmasi</th>
                                    <th>Kurir</th>
                                    <th>No. Resi</th>
                                    <th width='150px' class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($pesans as $pesan)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pesan->uuid_pesan }}</td>
                                        <td>{{ $pesan->uuid_konfirmasi }}</td>
                                        <td>{{ $pesan->Kurir }}</td>
                                        <td>{{ $pesan->no_resi }}</td>
                                        <td class="text-center">
                                            <a href="/konfirmasi_pesanan/{{ $pesan->uuid_pesan }}" class="btn btn-primary" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Konfirmasi Pembayaran">
                                                <i class="fas fa-check-circle"></i></a>

                                            <a href="/barang_pesanan/{{ $pesan->uuid_pesan }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Lihat Barang Pesanan">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">

                                {{-- <a href="/pesan/{{ Auth::user()->email }}"
                                    class="btn btn-primary btn-lg">Buat Pesanan</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
            $('[data-toggle="modal"]').modal();

        });
        $(function() {

            $('[data-toggle="modal"]').modal();

        })

    </script>

@endpush
