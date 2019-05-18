@extends('layouts.master')
@section('content')
<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Master Siswa</h4>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><button id="tambah" class="btn btn-success btn-sm">Tambah Siswa</button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table id="siswa" class="table table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nis</th>
                                            <th>Name</th>
                                            <th>Jk</th>
                                            <th>Agama</th>
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
@include('siswa.modal');
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    var getData = $('#siswa').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('masterSiswa.show') }}",
        columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'nis'},
                    { data: 'nama_siswa'},
                    { data: 'jenis_kelamin'},
                    { data: 'agama'},
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
    $.ajax({
            dataType:"json",
            url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi",
            success:function(data){
                $.each(data.semuaprovinsi,function(key,value){
                    $('#provinsi').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                })
            }
    });

    $('#provinsi').change(function(){
        var provinsiId = $('#provinsi :selected').attr("data-id");
        $.ajax({
            dataType:"json",
            url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi/"+provinsiId+"/kabupaten",
            success:function(data){
                $('#kabupaten').empty();
                $('#kabupaten').append("<option value=''>--- Pilih Kabupaten ---</option>");
                $('#kecamatan').empty();
                $('#kecamatan').append("<option value=''>--- Pilih Kecamatan ---</option>");
                $('#kelurahan').empty();
                $('#kelurahan').append("<option value=''>--- Pilih Kelurahan ---</option>");
                $.each(data.kabupatens,function(key,value){
                    $('#kabupaten').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                })
            }
        });
    });

    $('#kabupaten').change(function(){
        var kabupatenId = $('#kabupaten :selected').attr("data-id");
        $.ajax({
            dataType:"json",
            url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/"+kabupatenId+"/kecamatan",
            success:function(data){
                $('#kecamatan').empty();
                $('#kecamatan').append("<option value=''>--- Pilih Kecamatan ---</option>");
                $('#kelurahan').empty();
                $('#kelurahan').append("<option value=''>--- Pilih Kelurahan ---</option>");
                $.each(data.kecamatans,function(key,value){
                    $('#kecamatan').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                })
            }
        });
    });

    $('#kecamatan').change(function(){
        var kecamatanId = $('#kecamatan :selected').attr("data-id");
        $.ajax({
            dataType:"json",
            url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/"+kecamatanId+"/desa",
            success:function(data){
                $('#kelurahan').empty();
                $('#kelurahan').append("<option value=''>--- Pilih Kelurahan ---</option>");
                $.each(data.desas,function(key,value){
                    $('#kelurahan').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                })
            }
        });
    });

    $('#tambah').click(function(){
        $('.modal-header h4').text('Tambah Siswa');
        $('input[name="nis"]').prop("readonly",false);
        $('form :input').val('');
        $('button[type="submit"]').text('Save');
        $('#modal').modal('show');
    });
    $('#formSiswa').submit(function(e){
        e.preventDefault();
        NProgress.start();
        var nis = $('input[name="nis"]').val();
        var nama = $('input[name="nama"]').val();
        var tempat_lahir = $('input[name="tempat_lahir"]').val();
        var tgl_lahir = $('input[name="tgl_lahir"]').val();
        var agama = $('#agama :selected').val();
        var jenis_kelamin = $('#jenis_kelamin :selected').val();
        var gol_darah = $('#gol_darah :selected').val();
        var provinsi = $('#provinsi :selected').val();
        var kecamatan = $('#kecamatan :selected').val();
        var kabupaten = $('#kabupaten :selected').val();
        var kelurahan = $('#kelurahan :selected').val();
        var alamat = $('#alamat').val();
        var button = $('#submit').text();
        var url = '';
        var method = '';
        if(button == 'Save'){
            url = 'master-siswa';
            method = "post";
        }else{
            url = 'master-siswa/update/'+nis;
            method = "put";
        }
        $.ajax({
            type : "POST",
            url  :  url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                _method :  method,
                nis : nis,
                nama_siswa: nama,
                tempat_lahir : tempat_lahir,
                tanggal_lahir :  tgl_lahir,
                jenis_kelamin :  jenis_kelamin,
                agama : agama ,
                gol_darah :  gol_darah,
                provinsi :  provinsi,
                kecamatan : kecamatan,
                kabupaten : kabupaten,
                kelurahan : kelurahan,
                alamat :alamat,
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
        var nis = $(this).attr('data-id');
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
                    url  :  'master-siswa/'+nis,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(){
                        Toast.fire({
                            type: 'success',
                            title: "Siswa Berhasil Di Hapus",
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
        $('.modal-header h4').text('Edit Siswa');
        var nis = $(this).attr('data-id');
        $('input[name="nis"]').prop("readonly",true);
        $.ajax({
            type : "GET",
            url  :  'master-siswa/edit/'+nis,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },success:function(data){
                var provinsi = data.provinsi;
                var kecamatan = data.kecamatan;
                var kabupaten = data.kabupaten;
                var kelurahan = data.kelurahan;
                $.ajax({
                    dataType:"json",
                    url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi/"+provinsi+"/kabupaten",
                    success:function(data){
                        $.each(data.kabupatens,function(key,value){
                            $('#kabupaten').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                        });
                        $.ajax({
                            dataType:"json",
                            url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/"+kabupaten+"/kecamatan",
                            success:function(data){
                                $.each(data.kecamatans,function(key,value){
                                    $('#kecamatan').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                                });
                                $.ajax({
                                    dataType:"json",
                                    url:"http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/kecamatan/"+kecamatan+"/desa",
                                    success:function(data){
                                        $.each(data.desas,function(key,value){
                                            $('#kelurahan').append("<option value='"+value.id+"' data-id='"+value.id+"'>"+value.nama+"</option>");
                                        })
                                        $('#provinsi').val(provinsi);
                                        $('#kecamatan').val(kecamatan);
                                        $('#kabupaten').val(kabupaten);
                                        $('#kelurahan').val(kelurahan);
                                    }
                                });
                            }
                        });
                    }
                });
                $('form :input').val('');
                $('button[type="submit"]').text('Edit');
                $('input[name="nis"]').val(data.nis);
                $('input[name="nama"]').val(data.nama_siswa);
                $('input[name="tempat_lahir"]').val(data.tempat_lahir);
                $('input[name="tgl_lahir"]').val(data.tanggal_lahir);
                $('#agama').val(data.agama);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#gol_darah').val(data.gol_darah);
                $('#alamat').val(data.alamat);
                $('#modal').modal('show');
            },error:function(data){
                console.log(data);
            }
        })
    });

});
</script>
@endsection
