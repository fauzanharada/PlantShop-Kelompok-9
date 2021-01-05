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
                        {{ Form::model($kategori, ['url' => 'admin/kategori/' . $kategori->uuid_kategori, 'method' => 'PUT']) }}
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Nama Kategori</label>
                            <div class="col-md-5">
                                {{ Form::text('nama_kategori', null, ['class' => 'form-control', 'placeholder' => 'Nama Kategori']) }}
                            </div>
                        </div>

                        @include('admin.kategori.form')

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
