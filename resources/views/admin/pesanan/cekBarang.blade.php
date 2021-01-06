@extends('admin.layoutsAdmin.app')
@section('title', 'Barang Pesanan')
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
                                    <th>Nama Tanaman</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                $total = 41000;
                                @endphp
                                @foreach ($pesanans as $pesanan)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pesanan->produk->nama_produk }}</td>
                                        <td>{{ 'Rp. ' . format_uang($pesanan->produk->harga_produk) }}
                                    </tr>
                                    @php
                                    $total = $total + $pesanan->produk->harga_produk
                                    @endphp
                                @endforeach

                                <tr>
                                    <th class="text-center" colspan='2'>Ongkos Kirim</th>
                                    <td>{{ 'Rp. ' . format_uang(41000) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan='2'>Total Belanja</th>
                                    <td>{{ 'Rp. ' . format_uang($total) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h4 class="text-center">Pembayaran</h4>
                        <table class="table table-border">
                            <thead>
                                <th>Nama</th>
                                <th>Bank</th>
                                <th width=650>Foto</th>
                            </thead>
                            <tbody>
                                <td>{{ $konfirmasi->atas_nama }}</td>
                                <td>{{ $konfirmasi->bank }}</td>
                                <td><img style="widht:270px; object-fit:cover; object-position:center;"
                                    src="{{ asset('storage/' . $konfirmasi->foto_bukti_pembayaran . '') }}" class="card-img-top"></td>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="/admin/pesanan" class="btn btn-danger">Kembali</a>
                                <a href="/admin/pesanan/{{ $pesanan->uuid_pesan }}/cetak_alamat" class="btn btn-primary" target="_blank">Cetak Alamat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
