@extends('layouts.master')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Kelas</h4>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><button id="tambah" class="btn btn-success btn-sm">Tambah Kelas</button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="kelas" class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="30px;">#</th>
                                            <th>Kode Kelas</th>
                                            <th>Nama Kelas</th>
                                            <th>Jurusan</th>
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
@include('kelas.modal');
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    var getData = $('#kelas').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('kelas.show') }}",
        columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'kode_kelas'},
                    { data: 'nama_kelas'},
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
        $('input[name="kode_kelas"]').prop("readonly",false);
        $('form :input').val('');
        $('.modal-header h4').text('Tambah Kelas');
        $('button[type="submit"]').text('Save');
        $('#modal').modal('show');
    });

    $('#formKelas').submit(function(e){
        e.preventDefault();
        NProgress.start();
        var kode_kelas = $('input[name="kode_kelas"]').val();
        var jurusan_id = $('#jurusan_id :selected').val();
        var nama_kelas = $('input[name="nama_kelas"]').val();
        var button = $('#submit').text();
        var url = '';
        var method = '';
        if(button == 'Save'){
            url = 'master-kelas';
            method = "post";
        }else{
            url = 'master-kelas/update/'+kode_kelas;
            method = "put";
        }
        $.ajax({
            type : method,
            url  :  url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                kode_kelas : kode_kelas,
                nama_kelas: nama_kelas,
                jurusan_id: jurusan_id,
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
        var kode_kelas = $(this).attr('data-id');
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
                    url  :  'master-kelas/'+kode_kelas,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(){
                        Toast.fire({
                            type: 'success',
                            title: "Kelas Berhasil Di Hapus",
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
        $('.modal-header h4').text('Edit Kelas');
        var kode_kelas = $(this).attr('data-id');
        $('input[name="kode_kelas"]').prop("readonly",true);
        $.ajax({
            type : "GET",
            url  :  'master-kelas/edit/'+kode_kelas,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },success:function(data){
                $('form :input').val('');
                $('button[type="submit"]').text('Edit');
                $('input[name="kode_kelas"]').val(data.kode_kelas);
                $('input[name="nama_kelas"]').val(data.nama_kelas);
                $('#jurusan_id').val(data.jurusan_id);
                $('#modal').modal('show');
            },error:function(data){
                console.log(data);
            }
        })
    });

});
</script>
@endsection
