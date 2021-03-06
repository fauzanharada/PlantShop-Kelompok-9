@extends('user.layoutsuser.app')
@section('title', 'Konfirmasi Pesanan')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    @include('validation_error')


                    <div class="card-body">
                        {{ Form::open(['url' => 'konfirmasi_pesanan', 'enctype' => 'multipart/form-data']) }}
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">No. Pesanan</label>
                            <div class="col-md-5">
                                {{ Form::text('uuid_pesan', $pesan, ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>
                        </div>

                        @include('user.konfirmasi_pesanan.form')

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
