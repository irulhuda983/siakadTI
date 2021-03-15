@extends('layout.master')

@section('judul', 'Tambah User')

@section('content')
<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="row pb-5">
            <div class="col-md-12">
                <a href="/user" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <hr>
        <form action="/user" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>

                <div class="col-sm-10">
                    <select class="form-control m-b" name="role">
                        <option value="admin">Admin</option>
                        <option value="dosen" selected>Dosen</option>
                    </select>
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <button class="btn btn-success btn-sm" type="submit">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>

                    <button class="btn btn-danger btn-sm" type="reset">
                        <i class="fa fa-refresh"></i>
                        Reset
                    </button>
                </div>
            </div>
            
        </form>


    </div>
</div>
@endsection