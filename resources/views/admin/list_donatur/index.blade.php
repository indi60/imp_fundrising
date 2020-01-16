@extends('partial.main')
@section('title', 'Admin | ListDonatur')
@section('content')
<hr>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col s4">
                    <h4 style="margin-left:10px;">Data Donasi Project</h4>
                </div>
            </div>
                   
            <table style="text-transform: uppercase;" class="table table-striped" id="donasiproject_table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PROJECT</th>
                        <th>NAMA DONATUR</th>
                        <th>DONASI</th>
                        <th>NAMA BANK</th>
                        <th>BUKTI TRANSFER</th>
                        <th>STATUS</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>    
    </div>
</div>
@stop

@section('scripts')
    <script type="text/javascript">
    var table = $('#donasiproject_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('json/listdonatur')}}"
        },
        "columns" : [
            { data: 'id', render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1;}},
            { data: 'nama_project', name: 'nama_project' , "className": "dt-center",},
            { data: 'name', name: 'name' , "className": "dt-center",},
            { data: 'donasi', name: 'donasi' , "className": "dt-center",},
            { data: 'nama_bank', name: 'nama_bank' , "className": "dt-center",},
            { data: 'bukti_transfer', name: 'bukti_transfer' , "className": "dt-center",},
            { data: 'status', name: 'status' , "className": "dt-center", 
                render:function(data){
                    return data == '0' ? '<h4><span class="badge badge-danger text-light">Menunggu Konfirmasi</span></h4>' : '<h4> <span class="badge badge-success text-light">DiKonfirmasi</span></h4>';
                }
            },
            { data: 'action', name: 'action' , "className": "dt-center",},
        ]
    });

    </script>
@endsection

