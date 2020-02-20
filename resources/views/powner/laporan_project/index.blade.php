@extends('partial.main')
@section('title', 'Project Owner | Laporan Project')
@section('content')
<br>
<div class="container">
  <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Laporan Project</h5>
                    </div>
                    <div class="card-body">
                <a href="/powner/laporan_project/create"
                   style="background: #3a7bd5;  /* fallback for old browsers */
                    background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to right, #3a6073, #3a7bd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ margin-right:5px;"
                    id="float" class="btn btn-primary text-light"><i class="fas fa-plus"> Tambah Data</i></a><br><br>
                   
                        <div class="dt-responsive table-responsive">
                                        <table id="laporan_project" class="table table-striped table-bordered nowrap role="grid" aria-describedby="simpletable_info"">

                <thead>
                    <tr>
                        <th>NO</th>
                        <th>JUDUL LAPORAN</th>
                        <th>NAMA PROJECT</th>
                        <th>TARGET</th>
                        <th>TERKUMPUL</th>
                        <th>TANGGAL LAPORAN</th>
                        <th>KONTEN</th>
                        {{-- <th>STATUS</th> --}}
                        <th>ACTION</th>
                    </tr>
                </thead>    
            </table>    
        </div>
    </div>
</div>
@stop
@section('scripts')
    <script type="text/javascript">
    var table = $('#laporan_project').DataTable({
        dom: 'lBfrtip',
        buttons: [   {
                extend: 'excelHtml5',
                title: 'Laporan  Project',
                text: ' excel',
                exportOptions: {
                columns: [1,2,3,4,5,6]
            }            
        },        
        'copy', 'csv', 'pdf', 'print'],
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('json/lproject')}}"
        },
        "columns" : [
            { data: 'id', 
                render: function (data, type, row, meta) { 
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'judul_laporan', name: 'judul_laporan' , "className": "text-center",},
            { data: 'nama_project', name: 'nama_project' , "className": "text-center",},
            { data: 'target', render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp ' ),"className": "dt-center",},
            { data: 'terkumpul', render: $.fn.dataTable.render.number( '.', ',', 2, 'Rp ' ),"className": "dt-center",},
            { data: 'tanggal_laporan', name: 'tanggal_laporan' , "className": "text-center",},
            { data: 'kontent', name: 'kontent' , "className": "text-center",},
            // { data: 'status', name: 'status' , "className": "dt-center", 
            //     render:function(data){
            //         return (data == '0') ? '<h4><span class="badge badge-danger text-light">Menunggu Persetujuan Admin</span></h4>' : (data == '1') ? '<h4> <span class="badge badge-success text-light">Disetujui</span></h4>' : '<h4> <span class="badge badge-warning text-light">Ditolak</span></h4>';
            //     }
            // },

            { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
        ]
    });
    </script>
@endsection

{{-- @foreach ($project as $aa)
    {!!$aa->konten!!}
@endforeach --}}

