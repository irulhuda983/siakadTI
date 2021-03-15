@extends('layout.master')

@section('judul', 'Data Mata Kuliah')

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
                <a href="/matkul/create" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah Mata Kuliah
                </a>
            </div>
        </div>
        <hr>
        
        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr>

                <th data-toggle="true">Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Tahun Kurikulum</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($matkul as $data)
                <tr>
                    <td>{{ $data->kode_mk }}</td>
                    <td>{{ $data->nama_mk }}</td>
                    <td>{{ $data->sks }}</td>
                    <td>{{ $data->semester }}</td>
                    <td>{{ $data->tahun_kurikulum }}</td>
                    <td>
                        <a href="/matkul/{{ $data->id }}/edit" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger tombol-hapus" data-id="{{ $data->id }}" type="submit">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        <form action="/matkul/{{ $data->id }}" method="POST" id="delete{{ $data->id }}" class="d-flex d-inline">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6">
                    <ul class="pagination pull-right"></ul>
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