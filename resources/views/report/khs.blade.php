@extends('layout.master')

@section('judul', 'Nilai Mahasiswa')

@section('content')
<div class="wrapper wrapper-content">
    @if(session('notif'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <strong>Berhasil!</strong> {{ session('notif') }}.
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    </div>
    @endif
    <div class="ibox-content">
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-11">
                <a href="/report/khs-excel/{{ $mahasiswa->nim }}/{{ $mahasiswa->semester }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-file-excel-o"></i> Download Excel
                </a>

                <!-- Modal excel -->
                <div class="modal inmodal" id="modal-excel" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated flipInY">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Download KHS Mahasiswa (Format Excel)</h4>
                            </div>
                            <form action="/report/khs-excel" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal KHS</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="tanggal" class="form-control @error('nilai_angka') is-invalid @enderror">
                                        @error('nilai_angka')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                                    <i class="fa fa-refresh"></i>&nbsp;&nbsp;<span class="bold">Reset</span>
                                </button>
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fa fa-save"></i>&nbsp;&nbsp;<span class="bold">Simpan</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <a href="/report/khs-pdf/{{ $mahasiswa->nim }}/{{ $mahasiswa->semester }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-file-pdf-o"></i> Download Pdf
                </a>


            </div>
            <div class="col-md-1">
                <a href="/report" class="btn btn-warning btn-sm">
                    <i class="fa fa-left-arrow"></i> Kembali
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <table class="table table-responsive">
                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>:</td>
                        <td>{{ $mahasiswa->nama }}</td>
                    </tr>

                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>{{ $mahasiswa->nim }}</td>
                    </tr>

                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>{{ $mahasiswa->semester }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <table class="table table-responsive">
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td>SAINS DAN TEKNOLOGI</td>
                    </tr>

                    <tr>
                        <td>PRODI</td>
                        <td>:</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                    </tr>

                    <tr>
                        <td>TA</td>
                        <td>:</td>
                        <td>{{ $mahasiswa->periode }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <table class="table table-bordered toggle-arrow-tiny">
            <thead>
                <tr>
                    <th data-toggle="true" rowspan="2">No</th>
                    <th colspan="3">PROGRAM</th>
                    <th colspan="3">HASIL STUDI</th>
                </tr>
                <tr>
                    <th>Mata Kuliah</th>
                    <th>Kode MK</th>
                    <th>SKS</th>
                    <th>Ns</th>
                    <th>Nh</th>
                    <th>Ns. SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khs as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama_mk }}</td>
                        <td>{{ $data->kode_mk }}</td>
                        <td>{{ $data->sks }}</td>
                        <td>{{ $data->nilai_setara }}</td>
                        <td>{{ $data->nilai_huruf }}</td>
                        <td>{{ $data->nilai_setara * $data->sks }}</td>
                    </tr>

                @endforeach
                <tr>
                    <td colspan="3" class="text-center"><b>Jumlah</b></td>
                    <td><b>{{ $totalSks->jumlah }}</b></td>
                    <td></td>
                    <td></td>
                    <td><b>{{ $total->jumlah }}</b></td>
                </tr>

                <tr>
                    <td colspan="6" class="text-right"><b>IP Semester {{ $mahasiswa->semester }}</b></td>
                    <td><b>{{ number_format(($total->jumlah / $totalSks->jumlah), 2) }}</b></td>
                </tr>

                <tr>
                    <td colspan="6" class="text-right"><b>IPK Sementara</b></td>
                    <td><b>{{ number_format($ipk_sementara, 2) }}</b></td>
                </tr>
                
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('script')
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

</script>
@endsection