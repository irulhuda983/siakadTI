@extends('layout.master')

@section('judul', 'Edit Data Mahasiswa')

@section('content')
<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="row pb-5">
            <div class="col-md-12">
                <a href="/mahasiswa" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <hr>
        <form action="/mahasiswa/{{ $mahasiswa->id }}" method="post" class="form-horizontal">
            @method('patch')
            @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">NIM</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}">
                    @error('nim')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}">
                    @error('nama')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>

                <div class="col-sm-10">
                <select class="form-control m-b" name="jenis_kelamin">
                    <option value="L" @if($mahasiswa->jenis_kelamin == 'L') selected @endif>Laki - Laki</option>
                    <option value="P" @if($mahasiswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jurusan</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa->jurusan }}">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Angkatan</label>

                <div class="col-sm-10"><input type="text" class="form-control" name="angkatan" value="{{ $mahasiswa->angkatan }}">
                    @error('angkatan')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>

                <div class="col-sm-10">
                    <button class="btn btn-success btn-sm">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>

                    <button class="btn btn-danger btn-sm">
                        <i class="fa fa-refresh"></i>
                        Reset
                    </button>
                </div>
            </div>
            
        </form>


    </div>
</div>
@endsection