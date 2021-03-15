@extends('layout.master')

@section('judul', 'Nilai Mahasiswa')

@section('css')
<link href="{{ asset('dist/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper wrapper-content">

    <div class="ibox-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Cari KHS Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="/report/cari-khs" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NIM</label>
                
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" name="nim">
                                        <option value="">Pilih NIM</option>
                                        @foreach ($nim as $mhs)
                                        <option value="{{ $mhs->nim }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option> 
                                        @endforeach
                                    </select>
                                    @error('nim')
                                    <div class="text-danger"><small><i>{{ $message }}</i></small></div>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Semester</label>
                
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" name="semester">
                                        <option value="">Pilih Semester</option>
                                        @foreach ($semester as $smt)
                                        <option value="{{ $smt->semester }}">{{ $smt->semester }}</option> 
                                        @endforeach
                                    </select>
                                    @error('semester')
                                    <div class="text-danger"><small><i>{{ $message }}</i></small></div>
                                    @enderror
                                </div>
                            </div>
                
                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">Periode</label>
                
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" name="periode">
                                        @foreach ($periode as $prd)
                                        <option value="{{ $prd->periode }}">{{ $prd->periode }}</option> 
                                        @endforeach
                                    </select>
                                    @error('periode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                
                           
                
                
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                
                                <div class="col-sm-10">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-search"></i>
                                        Cari
                                    </button>
                
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Cari Transkip Nilai Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <form action="/report/cari-transkip" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NIM</label>
                
                                <div class="col-sm-10">
                                    <select class="select2_demo_1 form-control" name="nim2">
                                        <option value="">Pilih NIM</option>
                                        @foreach ($nim as $mhs)
                                        <option value="{{ $mhs->nim }}">{{ $mhs->nim }} - {{ $mhs->nama }}</option> 
                                        @endforeach
                                    </select>
                                    @error('nim2')
                                    <div class="text-danger"><small><i>{{ $message }}</i></small></div>
                                    @enderror
                                </div>
                            </div>
                
                
               
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                
                                <div class="col-sm-10">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fa fa-search"></i>
                                        Cari
                                    </button>
            
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('notif'))
    <div style="margin-top: 20px">
        <div class="alert alert-danger alert-dismissable" role="alert">
            <strong>Tidak Ditemukan !</strong> {{ session('notif') }}.
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
    </div>
    @endif
</div>
@endsection

@section('script')
<!-- Select2 -->
<script src="{{ asset('dist/js/plugins/select2/select2.full.min.js') }}"></script>

<script>
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault()
        let id = $(this).data('id')

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Apa Anda Yakin?',
        text: "Anda tidak dapat mengembalikan data ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Hapus!',
        cancelButtonText: 'Tidak, Kembali!',
        reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $(`#delete${id}`).submit()
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                document.reload()
            }
        })
    })

    $(".select2_demo_1").select2();

</script>
@endsection