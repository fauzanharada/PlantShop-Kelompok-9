@extends('user.layoutsUser.app')
@section('title', 'Keranjang')
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
                                    <th width='50px'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                    $total = 0;
                                @endphp
                                @foreach ($keranjangs as $keranjang)
                                    <tr>
                                        
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $keranjang->produk->nama_produk }}</td>
                                        <td>{{ 'Rp. ' . format_uang($keranjang->produk->harga_produk) }}
                                        <td>
                                            {{ Form::open(['url' => '/keranjang/'.$keranjang->uuid_keranjang,'method' => 'delete']) }}
                                            <button type='submit' class='btn btn-danger btn-sm'><i
                                                    class='fas fa-trash-alt'></i></button>
                                            {{ Form::close() }}

                                        </td>
                                    </tr>
                                    @php
                                        $total = $total + $keranjang->produk->harga_produk
                                    @endphp
                                @endforeach


                                <tr>
                                    <th class="text-center" colspan='2'>Total Belanja</th>
                                    <td>{{ 'Rp. ' . format_uang($total) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                
                                <a href="/pesan/{{ Auth::user()->email }}" class="btn btn-primary btn-lg">Buat Pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
