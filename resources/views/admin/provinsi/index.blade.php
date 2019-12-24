@extends('partial.main')
<meta name="csrf-token" content="{{csrf_token()}}">
@section('title', 'Admin | Provinsi')
@section('content')
<hr>
<div class="container">
    <div class="text-center mt-5">
         <h3> Data Provinsi </h3>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <a onclick="addForm()" class="btn btn-primary"><i class="fas fa-plus"> Tambah Data</i></a><br><br>
        </div>  
        <div class="panel-body">
            <table style="text-transform: uppercase;" class="table table-striped" id="provinsi_table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PROVINSI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
            </table>    
        </div>
    </div>
</div>
@include('admin/provinsi/form')
@stop

@section('scripts')
    <script type="text/javascript">
    var table = $('#provinsi_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('json/provinsi')}}"
        },
        "columns" : [
            { data: 'id', render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1;}},
            { data: 'nama_provinsi', name: 'nama_provinsi' , "className": "dt-center",},
            { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
        ]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Provinsi');
        
    }
    $(function () {
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('admin/provinsi') }}";
                else url = "{{ url('admin/provinsi') . '/' }}" + id;

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
            url: "{{url ('admin/provinsi') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Provinsi');

                $('#id').val(data.id);
                $('#nama_provinsi').val(data.nama_provinsi);
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
                url: "{{ url('admin/provinsi') }}" + '/' + id,
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
    </script>
@endsection

