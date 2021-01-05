@extends('user.layoutsUser.app')
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
                                @foreach ($barangs as $barang)
                                    <tr>

                                        <td>{{ $i++ }}</td>
                                        <td>{{ $barang->produk->nama_produk }}</td>
                                        <td>{{ 'Rp. ' . format_uang($barang->produk->harga_produk) }}
                                    </tr>
                                    @php
                                    $total = $total + $barang->produk->harga_produk
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
