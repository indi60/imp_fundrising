@extends('partial.main')
@section('title', auth()->user()->name.' | List Fundraiser')
@section('content')
<div class="container mb-5">
 <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data List Fundraiser</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="create_project" class="table table-striped table-bordered nowrap role="grid" aria-describedby="simpletable_info"">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PROJECT</th>
                        <th>STATUS</th>
                        <th>ALASAN</th>
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
    var table = $('#create_project').DataTable({
        
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('json/list_owner_project')}}"
        },
        "columns" : [
            { data: 'id', 
                render: function (data, type, row, meta) { 
                    return meta.row + meta.settings._iDisplayStart + 1;
                },  "className": "dt-center"
            },
            { data: 'nama_project', name: 'nama_project' , "className": "text-center",},
            { data: 'status', name: 'status' , "className": "dt-center", 
            render:function(data){
                return (data == '0') ? '<h4><span class="badge badge-danger text-light">Menunggu Persetujuan Admin</span></h4>' : (data == '1') ? '<h4> <span class="badge badge-success text-light">Disetujui</span></h4>' : '<h4> <span class="badge badge-warning text-light">Ditolak</span></h4>';
            }
            },
            { data: 'alasan', name: 'alasan' , "className": "text-center",},
            { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
        ]
    });
    </script>
@endsection

{{-- @foreach ($project as $aa)
    {!!$aa->konten!!}
@endforeach --}}

