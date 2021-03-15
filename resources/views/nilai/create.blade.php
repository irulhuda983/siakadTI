@extends('layout.master')

@section('judul', 'Tambah Nilai')

@section('css')
<link href="{{ asset('dist/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="row pb-5">
            <div class="col-md-12">
                <a href="/nilai" class="btn btn-warning btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <hr>
        <form action="/nilai" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">NIM</label>

                <div class="col-sm-10">
                    <select class="select2_demo_1 form-control" name="nim">
                        @foreach ($mahasiswa as $mhs)
                        <option value="{{ $mhs->nim }}">{{ $mhs->nim.' - '.$mhs->nama }}</option> 
                        @endforeach
                    </select>
                    @error('nim')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Mata Kuliah</label>

                <div class="col-sm-10">
                    <select class="select2_demo_1 form-control" name="kode_mk">
                        @foreach ($matkul as $data)
                        <option value="{{ $data->kode_mk }}">{{ $data->kode_mk .' - '. $data->nama_mk }}</option> 
                        @endforeach
                    </select>
                    @error('kode_mk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Kelas</label>

                <div class="col-sm-10">
                    <select class="select2_demo_1 form-control" name="nama_kelas">
                        <option value="A">A</option> 
                        <option value="B">B</option> 
                        <option value="C">C</option> 
                        <option value="D">D</option> 
                        <option value="E">E</option> 
                        <option value="F">F</option> 
                        <option value="H">H</option> 
                    </select>
                    @error('nama_kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Periode</label>

                <div class="col-sm-10">
                    <input type="text" name="periode" class="form-control @error('periode') is-invalid @enderror">
                    @error('periode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Dosen</label>

                <div class="col-sm-10">
                    <input type="text" name="dosen" class="form-control @error('dosen') is-invalid @enderror">
                    @error('dosen')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Angka</label>

                <div class="col-sm-10">
                    <input type="text" name="nilai_angka" class="form-control @error('nilai_angka') is-invalid @enderror">
                    @error('nilai_angka')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Setara</label>

                <div class="col-sm-10">
                    <input type="text" name="nilai_setara" class="form-control @error('nilai_setara') is-invalid @enderror">
                    @error('nilai_setara')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nilai Huruf</label>

                <div class="col-sm-10">
                    <input type="text" name="nilai_huruf" class="form-control @error('nilai_huruf') is-invalid @enderror">
                    @error('nilai_huruf')
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

@section('script')
    <!-- Select2 -->
    <script src="{{ asset('dist/js/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2_demo_1").select2();
        })
    </script>
@endsection