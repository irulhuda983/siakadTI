@extends('layout.master')

@section('judul', 'Tambah Mata Kuliah')

@section('content')
<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="row pb-5">
            <div class="col-md-12">
                <a href="/matkul" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <hr>
        <form action="/matkul/{{ $kurikulum->id }}" method="post" class="form-horizontal">
            @method('patch')
            @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">Kode Matkul</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('kode_mk') is-invalid @enderror" name="kode_mk" value="{{ $kurikulum->kode_mk }}">
                    @error('kode_mk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Matkul</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_mk') is-invalid @enderror" name="nama_mk" value="{{ $kurikulum->nama_mk }}">
                    @error('nama_mk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">SKS</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('sks') is-invalid @enderror" name="sks" value="{{ $kurikulum->sks }}">
                    @error('sks')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Semester</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ $kurikulum->semester }}">
                    @error('semester')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Kurikulum</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control @error('tahun_kurikulum') is-invalid @enderror" name="tahun_kurikulum" value="{{ $kurikulum->tahun_kurikulum }}">
                    @error('tahun_kurikulum')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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