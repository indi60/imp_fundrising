@extends('partial.main')
@section('title', 'Admin | List Fundraiser')
@section('content')
<div class="container mb-5">
    <div class="text-center mt-5">
         <h3> Data Project </h3>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table style="text-transform: uppercase;" class="table table-striped" id="create_project">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PROJECT</th>
                        <th>STATUS</th>
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
                }
            },
            { data: 'nama_project', name: 'nama_project' , "className": "text-center",},
            { data: 'status', name: 'status' , "className": "dt-center", 
                render:function(data){
                    return data == '0' ? '<h4><span class="badge badge-danger text-light">Menunggu Persetujuan Admin</span></h4>' : '<h4> <span class="badge badge-success text-light">Disetujui</span></h4>';
                }
            },
            { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
        ]
    });
    </script>
@endsection

{{-- @foreach ($project as $aa)
    {!!$aa->konten!!}
@endforeach --}}

