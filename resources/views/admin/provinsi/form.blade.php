@extends('partial.main')
@section('title', 'Provinsi')
@section('content')
        <form method="POST" action="{{ empty($data) ? '/admin/provinsi' : '/admin/provinsi/'.$data->id.'/edit' }}">
            @csrf
            @if ( !empty($data))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="form-group">
                <label for="nama_provinsi">Nama Provinsi</label>
                {!! Form::text('nama_provinsi', !empty($data) ? $data['nama_provinsi'] : '', ['class' =>
                $errors->has('nama_provinsi') ? 'invalid' : '']) !!}
                {{-- <input type="text" class="form-control @error('nama_provinsi') is-invalid @enderror" id="nama_provinsi" placeholder="Masukkan Nama Provinsi" name="nama_provinsi" value="{{ old('nama_provinsi')}}">
                --}}
                {{-- @error('nama_provinsi')
                                <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
    </div>
    <button type="submit" class="btn btn-primary">Submit!</button>
    </form>
@endsection
