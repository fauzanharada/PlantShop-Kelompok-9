@extends('user.layoutsUser.app')
@section('title', 'Halaman Utama')
@section('content')
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" height="500px" src="{{ asset('storage/slide/slide1.jpg') }}">
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Produk Terbaru</h3>
            </div>
        </div>
        <br>
        <div class="row">
            @foreach ($produks as $produk)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img style="height:270px; object-fit:cover; object-position:center;"
                            src="{{ asset('storage/' . $produk->foto_path . '') }}" class="card-img-top">
                        <div class="card-body">
                            <b>
                                <h4 class="card-title">{{ $produk->nama_produk }}</h4>
                            </b>
                            <hr>
                            <p class="card-text text-small">
                                {{ Str::limit($produk->detail_produk, 100) }} <a href= "{{ 'produk/'.$produk->uuid_produk }}">Read More</a>
                            </p>
                            <p class="card-text">
                                    {{ 'Rp. ' . format_uang($produk->harga_produk) }}
                            </p>
                            {{ Form::open(['url' => '/keranjang']) }}
                            @guest
                            
                            @else
                            {{ Form::hidden('email', Auth::user()->email , ['class' => 'btn btn-primary']) }}

                            @endif
                            {{ Form::hidden('uuid_produk', $produk->uuid_produk, ['class' => 'btn btn-primary']) }}
                            {{ Form::submit('Masukkan Keranjang', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $produks->links() }}
            </div>
        </div>

    </div>
    <br>
    <br>
    

@endsection
