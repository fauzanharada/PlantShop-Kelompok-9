@extends('admin.layoutsAdmin.app')
@section('title', 'Edit Kategori Tanaman')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    @include('admin.validation_error')


                    <div class="card-body">
                        {{ Form::model($pesan, ['url' => 'admin/pesanan/' . $pesan->uuid_pesan . '/resi', 'method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">No. Pesanan</label>
                            <div class="col-md-5">
                                {{ Form::text('uuid_pesan', null, ['class' => 'form-control', 'readonly' => 'true']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kurir</label>
                            <div class="col-md-5">
                                {{ Form::text('kurir', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">No. Resi</label>
                            <div class="col-md-5">
                                {{ Form::text('no_resi', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                                </form>
                                <a href="/admin/pesanan" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
