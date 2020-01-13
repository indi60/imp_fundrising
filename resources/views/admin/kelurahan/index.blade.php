@extends('partial.main')
@section('title', 'Admin | Kelurahan')
@section('content')
<hr>
<div class="container">
    <div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col s4">
                <h4 style="margin-left:10px;">Data Kelurahan</h4>
            </div>
        </div>
        <a onclick="addForm()"
        style="background: #3a7bd5;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #3a6073, #3a7bd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                id="float" class="btn btn-primary text-light"><i class="fas fa-plus"> Tambah Data</i></a><br><br>
   
        <table style="text-transform: uppercase;" class="table table-striped" id="kelurahan_table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA PROVINSI</th>
                    <th>NAMA KABUPATEN</th>
                    <th>NAMA KECAMATAN</th>
                    <th>NAMA KELURAHAN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
</div>
@include('admin/kelurahan/form')
@stop

@section('scripts')
<script type="text/javascript">
    var table = $('#kelurahan_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{route('json/kelurahan')}}"
        },
        "columns": [{
                data: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'nama_provinsi',
                name: 'nama_provinsi',
                "className": "dt-center",
            },
            {
                data: 'nama_kabupaten',
                name: 'nama_kabupaten',
                "className": "dt-center",
            },
            {
                data: 'nama_kecamatan',
                name: 'nama_kecamatan',
                "className": "dt-center",
            },
            {
                data: 'nama_kelurahan',
                name: 'nama_kelurahan',
                "className": "dt-center",
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                "width": "25%",
                "className": "dt-center"
            }
        ]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add');
    }
    $('#kabupaten_id').prop('disabled', true);
    $('#kecamatan_id').prop('disabled', true);
    $('#nama_kelurahan').prop('disabled', true);
    $('#provinsi_id').change(function() {
    var provinsiID =$(this).val();
    if (provinsiID) {
        $.ajax({
            type:"GET",
            url:"{{url('admin/get_kabupaten/kelurahan')}}?provinsi_id="+provinsiID,
            success:function(res){
                if (res) {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').prop('disabled', false);
                    $('#kabupaten_id').append('<option selected disabled>PILIH KABUPATEN</option>');
                    $.each(res,function(key, value){
                        $('#kabupaten_id').append('<option value="'+key+'">'+value+'</option>');
                    });
                }else{
                    $('#kabupaten_id').empty();
                }
            }
        });
    }else{
        $('#kabupaten_id').empty();
        $('#kecamatan_id').empty();
    }
    });
    $('#kabupaten_id').change(function() {
        var kabupatenID =$(this).val();
        if (kabupatenID) {
            $.ajax({
                type:"GET",
                url: "{{url('admin/get_kecamatan/kelurahan')}}?kabupaten_id="+kabupatenID,
                success:function(res){
                    if (res) {    
                        $('#kecamatan_id').empty();
                        $('#kecamatan_id').prop('disabled', false);
                        $('#kecamatan_id').append('<option selected disabled>PILIH KECAMATAN</option');
                        $.each(res,function(key, value){
                            $('#kecamatan_id').append('<option value="'+key+'">'+value+'</option>');
                        });
                    }else{
                        $('#kecamatan_id').empty();
                    }
                }
            });
        }else{
            $('#kecamatan_id').empty();
        }
    });
    $('#kecamatan_id').change(function() {
        $('#nama_kelurahan').prop('disabled', false);
    })
    $(function () {
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('admin/kelurahan') }}";
                else url = "{{ url('admin/kelurahan') . '/' }}" + id;

                $.ajax({
                    url: url,
                    type: "POST",
                    // data : $('#modal-form form').serialize(),
                    data: new FormData($("#modal-form form")[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: 'Data berhasil ditambahkan',
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error: function (data) {
                        swal({
                            title: 'Oops...',
                            text: 'Ada yang salah',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
                return false;
            }
        });
    });

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
            url: "{{url ('admin/kelurahan') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit');

                $('#id').val(data.id);
                $('#provinsi_id').val(data.provinsi_id);
                $('#kabupaten_id').val(data.nama_kabupaten);
                $('#kecamatan_id').val(data.nama_kecamatan);
                $('#nama_kelurahan').val(data.nama_kelurahan);
            },
            error: function () {
                alert("Nothing Data");
            }
        })

    }

    function deleteData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: 'Apakah Kamu Yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then(function () {
            $.ajax({
                url: "{{ url('admin/kelurahan') }}" + '/' + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (data) {
                    table.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: 'berhasil dihapus',
                        type: 'success',
                        timer: '1500'
                    })
                },
                error: function () {
                    swal({
                        title: 'Oops...',
                        text: 'ada yang salah',
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
    }
    $(document).ready(function() {  
        $('form select').select2({ width: '100%' });
    });
</script>
@endsection
