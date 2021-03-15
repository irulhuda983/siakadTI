@extends('layout.master')

@section('judul', 'Data User')

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
                <a href="/user/create" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah User
                </a>
            </div>
        </div>
        <hr>
        
        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr>

                <th data-toggle="true">Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->role }}</td>
                    <td>
                        <a href="/user/{{ $data->id }}/change" class="btn btn-success btn-sm">
                            <i class="fa fa-key"></i> Ubah Password
                        </a>
                        <a href="/user/{{ $data->id }}/edit" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger tombol-hapus" data-id="{{ $data->id }}" type="submit">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                        <form action="/user/{{ $data->id }}" method="POST" id="delete{{ $data->id }}" class="d-flex d-inline">
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