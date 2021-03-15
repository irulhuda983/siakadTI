@extends('layout.master')

@section('judul', 'Home')

@section('content')
<div class="wrapper wrapper-content">
    @if (session('notif'))
    <div class="alert alert-success alert-dismissable" role="alert">
        <strong>Berhasil!</strong> {{ session('notif') }}.
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    </div>
    @endif
    <div class="ibox-content">
        <h1>Hallo Word</h1>
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