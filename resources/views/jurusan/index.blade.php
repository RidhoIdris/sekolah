@extends('layouts.master')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Jurusan</h4>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><button id="tambah" class="btn btn-success btn-sm">Tambah Jurusan</button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="jurusan" class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Jurusan</th>
                                            <th width="15px">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('jurusan.modal');
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    var getData = $('#jurusan').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('jurusan.show') }}",
        columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'nama_jurusan'},
                    { data: 'action', name: 'action', orderable:false, searchable:false },
                ],
    });
    const Toast = Swal.mixin({
        toast: true,
        customClass: {container: 'my-swal'},
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    $('#tambah').click(function(){
        $('form :input').val('');
        $('.modal-header h4').text('Tambah Jurusan');
        $('button[type="submit"]').text('Save');
        $('#modal').modal('show');
    });

    $('#formJurusan').submit(function(e){
        e.preventDefault();
        NProgress.start();
        var id = $('input[name="id"]').val();
        var nama_jurusan = $('input[name="nama_jurusan"]').val();
        var button = $('#submit').text();
        var url = '';
        var method = '';
        if(button == 'Save'){
            url = 'master-jurusan';
            method = "post";
        }else{
            url = 'master-jurusan/update/'+id;
            method = "put";
        }
        $.ajax({
            type : method,
            url  :  url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                nama_jurusan: nama_jurusan,
            },
            success:function(data){
                $('#modal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: data.message
                });
                getData.ajax.reload();
                NProgress.done();
            },
            error:function(data){
                Toast.fire({
                    type: 'error',
                    title: data.responseJSON.errors,
                });
                NProgress.done();
            }
        });
    });

    $(document).on('click','#hapus',function(e){
        var id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                NProgress.start();
                $.ajax({
                    type : "DELETE",
                    url  :  'master-jurusan/'+id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(){
                        Toast.fire({
                            type: 'success',
                            title: "Jurusan Berhasil Di Hapus",
                        });
                        getData.ajax.reload();
                        NProgress.done();
                    },error:function(data){
                        console.log(data);
                        NProgress.done();
                    }
                })
            }
        })
    });

    $(document).on('click','#edit',function(){
        $('.modal-header h4').text('Edit Jurusan');
        var id = $(this).attr('data-id');
        $.ajax({
            type : "GET",
            url  :  'master-jurusan/edit/'+id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },success:function(data){
                $('form :input').val('');
                $('button[type="submit"]').text('Edit');
                $('input[name="id"]').val(data.id);
                $('input[name="nama_jurusan"]').val(data.nama_jurusan);
                $('#modal').modal('show');
            },error:function(data){
                console.log(data);
            }
        })
    });

});
</script>
@endsection
