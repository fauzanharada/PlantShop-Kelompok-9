@extends('admin.layoutsAdmin.app')
@section('title', 'Edit Produk Tanaman')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    @include('admin.validation_error')


                    <div class="card-body">
                        {{ Form::model($produk, ['url' => 'admin/produk/' . $produk->uuid_produk, 'enctype' => 'multipart/form-data']) }}
                        @method("PATCH")
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Nama Produk</label>
                            <div class="col-md-5">
                                {{ Form::text('nama_produk', null, ['class' => 'form-control', 'placeholder' => 'Nama Produk']) }}
                            </div>
                        </div>

                        @include('admin.produk.form')
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                                </form>
                                <a href="/admin/produk" class="btn btn-danger">Kembali</a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
