@extends('layout.master')

@section('judul', 'Data Mahasiswa')

@section('content')
<div class="wrapper wrapper-content">
    @if (session('notif'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <strong>Berhasil!</strong> {{ session('notif') }}.
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    </div>
    @endif
    <div class="ibox-content">
        <div class="row pb-5">
            <div class="col-md-12">
                <a href="/mahasiswa/create" class="btn btn-primary btn-sm">
                    <i class="fa fa-user-plus"></i> Tambah Data Mahasiswa
                </a>

                <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#modal-upload">
                    <i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload Mahasiswa</span>
                </button>

                <!-- Modal -->
                <div class="modal inmodal" id="modal-upload" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content animated flipInY">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Upload Data Mahasiswa</h4>
                            </div>
                            <form action="/mahasiswa/upload" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pilih File</label>

                                    <div class="col-sm-10">
                                        <input type="file" name="file" class="form-control @error('nilai_angka') is-invalid @enderror">
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
            </div>
        </div>
        <hr>
        
        <table class="table table-stripped toggle-arrow-tiny">
            <thead>
                <tr>

                <th data-toggle="true">NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mhs)
                <tr>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->jurusan }}</td>
                    <td>{{ $mhs->angkatan }}</td>
                    <td>
                        <a href="/mahasiswa/{{ $mhs->id }}/edit" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger tombol-hapus" data-id="{{ $mhs->id }}" type="submit">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        <form action="/mahasiswa/{{ $mhs->id }}" method="POST" id="delete{{ $mhs->id }}" class="d-flex d-inline">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    
                </td>
                <td>
                    {{ $mahasiswa->links() }}
                    {{-- <ul class="pagination pull-right"></ul> --}}
                </td>
            </tr>
            </tfoot>
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