@extends('partial.main')
@section('title', 'Admin | Home')

@section('menu')
<ul>
    <li class="current"><a href="#">
            <div>List Project</div>
        </a></li>
    <li><a href="#">
            <div>List Donatur</div>
        </a></li>
    <li><a href="#">
            <div>List Owner Project</div>
        </a></li>
    <li><a href="#">
            <div>Referensi</div>
        </a>
        <ul>
            <li><a href="#">
                    <div>Kategori Project</div>
                </a></li>
            <li><a href="#">
                    <div>Provinsi</div>
                </a></li>
            <li><a href="#">
                    <div>Kabupaten</div>
                </a></li>
            <li><a href="#">
                    <div>Kelurahan</div>
                </a></li>
            <li><a href="#">
                    <div>Kecamatan</div>
                </a></li>
        </ul>
    </li>
   
</ul>
@endsection
