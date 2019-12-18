@extends('partial.main')
@section('title', 'Admin | Kabupaten')
@section('content')
<a href="/admin/kabupaten/create" class="btn btn-primary">Tambah Data</a><br><br>
<table style="text-transform: uppercase;" class="table"  id="kabupaten_table">
    <thead>
        <tr>
        <th>NO</th>
        <th>NAMA PROVINSI</th>
        <th>NAMA KABUPATEN</th>
        <th>ACTION</th>
        </tr>
    </thead>
</table>
@stop

@section('scripts')
    <script>
    var table = $('#kabupaten_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax" : {
            "url" : "{{route('admin.kabupaten.json')}}"
        },
        "columns" : [
            { data: 'id', name: 'id' , "className": "dt-center", "width": "10%"},
            { data: 'nama_provinsi', name: 'nama_provinsi' , "className": "dt-center",},
            { data: 'nama_kabupaten', name: 'nama_kabupaten' , "className": "dt-center",},
            { data: 'action', name: 'action', orderable:false, searchable: false, "width": "25%", "className": "dt-center" } 
        ]
    })
    </script>
@endsection

