@extends('user.layoutsUser.app')
@section('title', 'Biodata')
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
                                <div class="col-2">
                                    <i class="fa fa-user fa-10x" aria-hidden="true"></i>
                                </div>
                                <div class="col-5">
                                    <table>
                                        <tr>
                                            <td width='150px'>Nama Lengkap</td>
                                            <td>:</td>
                                            <td>{{ $biodata->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <td width='150px'>Email</td>
                                            <td>:</td>
                                            <td>{{ $biodata->email }}</td>
                                        </tr>
                                        <tr>
                                            <td width='150px'>No. Telepon</td>
                                            <td>:</td>
                                            <td>{{ $biodata->no_hp }}</td>
                                        </tr>
                                        <tr>
                                            <td width='150px'>Alamat Lengkap</td>
                                            <td>:</td>
                                            <td>{{ $biodata->alamat_lengkap }}</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <a href="/biodata/{{ $biodata->email }}/edit" class="btn btn-warning text-right">Edit
                                        Data</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
