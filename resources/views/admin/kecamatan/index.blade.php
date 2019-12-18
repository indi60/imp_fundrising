@extends('layouts.partial.mainDashboard')
@section('title', 'Kecamatan')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kecamatan</h1>
    </div>
    <div class="section-body">
    <a href="/admin/kecamatan/create" class="btn btn-primary">Tambah Data</a><br><br>
        <div class="row">
            <div class="col-10">
                <table class="table">
                    <thead class="thead-dark">
                        <th scope="col">No</th>
                        <th scope="col">Nama Kecamatan</th>
                        <th scope="col">Nama Kabupaten</th>
                        <th scope="col">Aksi</th>
                    </thead>
                    <tbody>
                        {{-- @foreach( $kabupaten as $key=>$kab ) --}}
                        <tr>
                        {{-- <td>{{$key+1}}</td>
                        <td>{{$kab->nama_provinsi}}</td>
                        <td>{{$kab->nama_kabupaten}}</td>
                            <td>
                            <a href="/admin/kabupaten/{{ $kab->id }}/edit" class="btn btn-success">Edit</a>
                            <form action="/admin/kabupaten/{{ $kab->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Yakin Hapus?')" type="submit"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
