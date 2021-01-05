@extends('user.layoutsUser.app')
@section('title', 'Detail Tanaman')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        @include('alert')
                        <br>
                        <div class="row">
                            <div class="col-5">
                                <img style="height:270px; object-fit:cover; object-position:center;"
                                    src="{{ asset('storage/' . $produk->foto_path . '') }}" class="card-img-top">
                            </div>
                            <div class="col-7">
                                <table>
                                    <tr>
                                        <td width='150px'>Nama Tanaman</td>
                                        <td>:</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                    </tr>
                                    <tr>
                                        <td width='150px'>Kategori</td>
                                        <td>:</td>
                                        <td>{{ $produk->uuid_kategori }}</td>
                                    </tr>
                                    <tr>
                                        <td width='150px'>Harga</td>
                                        <td>:</td>
                                        <td>{{ 'Rp. ' . format_uang($produk->harga_produk) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="align-top" width='150px'>Detail</td>
                                        <td>:</td>
                                        <td>{{ $produk->detail_produk }}</td>
                                    </tr>
                                </table>
                                <br>
                                <a href="/produk/{{ $produk->uuid_produk }}/edit" class="btn btn-primary text-right">Masukkan Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
