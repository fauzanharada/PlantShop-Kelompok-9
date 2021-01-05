@extends('user.layoutsUser.app')
@section('title', 'Produk')
@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Kategori</h3>
            </div>
        </div>
        <br>
        <div class="row ">
            @foreach ($kategoris as $kategori)
                <div class="col-md-6 text-center ">
                    <a class="btn btn-success btn-lg" style="width:300px;" href="/produk/kategori/{{ $kategori->uuid_kategori }}">
                        {{ $kategori->nama_kategori }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>


@endsection
