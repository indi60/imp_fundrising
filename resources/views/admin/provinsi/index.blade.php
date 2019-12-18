@extends('partial.main')
@section('title', 'Admin | Provinsi')

@section('content')
<a href="/admin/provinsi/create" class="btn btn-primary">TAMBAH</a>
<table style="text-transform: uppercase;" class="table table-bordered" id="provinsi_table">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA PROVINSI</th>
            <th>ACTION</th>
        </tr>
    </thead>
</table>
@stop

@section('scripts')
<script>
        var table = $('#provinsi_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url" : "{{route('admin.provinsi.json')}}"
            },
            "columns": [
                { data: 'id', name: 'id' , "className": "dt-center", "width": "10%"}, 
                { data: 'nama_provinsi', name: 'nama_provinsi' , "className": "dt-center"}, 
                { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
            ]
        })
    // })
    </script>
@endsection

