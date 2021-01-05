@extends('user.layoutsUser.app')
@section('title', 'Ubah Biodata')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        {{ Form::model($biodata, ['url' => 'biodata/' . $biodata->email, 'method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Nama Lengkap</label>
                            <div class="col-md-5">
                                {{ Form::text('nama_lengkap', null, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Email</label>
                            <div class="col-md-5">
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'readonly' => 'true']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">No. Telepon</label>
                            <div class="col-md-5">
                                {{ Form::text('no_telepon', null, ['class' => 'form-control', 'placeholder' => 'No. Telepon']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Alamat Lengkap</label>
                            <div class="col-md-5">
                                {{ Form::textarea('alamat_lengkap', null, ['class' => 'form-control', 'placeholder' => 'Alamat Lengkap', 'size' => '5x3']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}
                                </form>
                                <a href="/admin/kategori" class="btn btn-danger">Kembali</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
