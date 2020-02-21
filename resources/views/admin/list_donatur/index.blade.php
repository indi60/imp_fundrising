@extends('partial.main')
@section('title', auth()->user()->name.' | ListDonatur')
@section('content')
<div class="container mt-5 mb-5">
 <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data List Donatur</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="donasiproject_table" class="table table-striped table-bordered nowrap role="grid" aria-describedby="simpletable_info"">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PROJECT</th>
                        <th>NAMA DONATUR</th>
                        <th>KODE UNIK</th>
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
        "sScrollX": "100%",
        "sScrollXInner": "110%",
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('json/listdonatur')}}"
        },
        "columns" : [
            { data: 'id', render: function (data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1;},  "className": "dt-center"},
            { data: 'nama_project', name: 'nama_project' , "className": "dt-center",},
            { data: 'name', name: 'name' , "className": "dt-center",},
            { data: 'kode_unik', name: 'kode_unik' , "className": "dt-center",},
            { data: 'kode', name: 'kode' , "className": "dt-center",},
            { data: 'nama_bank', name: 'nama_bank' , "className": "dt-center",},
            { data: 'bukti_transfer', name: 'bukti_transfer' , "className": "dt-center",},
            { data: 'status', name: 'status' , "className": "dt-center", 
                render:function(data){
                    return (data == '0') ? '<h4><span class="badge badge-danger text-light">Menunggu Persetujuan Admin</span></h4>' : (data == '1') ? '<h4> <span class="badge badge-success text-light">Disetujui</span></h4>' : '<h4> <span class="badge badge-warning text-light">Ditolak</span></h4>';
                }
            },
            { data: 'action', name: 'action' , "className": "dt-center",},
        ]
    });

    </script>
@endsection

