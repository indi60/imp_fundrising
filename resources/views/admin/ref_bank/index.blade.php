@extends('partial.main')
@section('title', 'Admin | Bank')
@section('content')
<div class="container mt-5 mb-5">
   <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Bank</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                <a onclick="addForm()"
                   style="background: #3a7bd5;  /* fallback for old browsers */
                    background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to right, #3a6073, #3a7bd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ margin-right:5px;"
                    id="float" class="btn btn-primary text-light"><i class="fas fa-plus"> Tambah Data</i></a><br><br>
                   
                <table id="bank_table" class="table table-striped table-bordered nowrap role="grid" aria-describedby="simpletable_info"">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BANK</th>
                        <th>NAMA REKENING</th>
                        <th>NO REKENING</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
            </table>    
    </div>
</div>
@include('admin/ref_bank/form')
@stop

@section('scripts')
    <script type="text/javascript">
    var table = $('#bank_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('json/refbank')}}"
        },
        "columns" : [
            { data: 'id', render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1;}},
            { data: 'nama_bank', name: 'nama_bank' , "className": "dt-center",},
            { data: 'nama_rekening', name: 'nama_rekening' , "className": "dt-center",},
            { data: 'no_rekening', name: 'no_rekening' , "className": "dt-center",},
            { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
        ]
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Bank');
        
    }
    $(function () {
        $('#modal-form form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                if (save_method == 'add') url = "{{ url('admin/refbank') }}";
                else url = "{{ url('admin/refbank') . '/' }}" + id;

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
            url: "{{url ('admin/refbank') }}" + '/' + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text('Edit Bank');

                $('#id').val(data.id);
                $('#nama_bank').val(data.nama_bank);
                $('#nama_rekening').val(data.nama_rekening);
                $('#no_rekening').val(data.no_rekening);
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
                url: "{{ url('admin/refbank') }}" + '/' + id,
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

