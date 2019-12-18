@extends('partial.main')
@section('title', 'Kabupaten')
@section('content')
<form method="POST" action="{{ empty($data) ? '/admin/kabupaten' : '/admin/kabupaten/'.$data->id.'/edit' }}">
    @csrf
    @if( !empty($data) )
    <input type="hidden" name="_method" value="PUT">
    @endif
        <div class="input-field">
            <select name="provinsi_id" id="provinsi_id" required>
                @foreach ($provinsi as $key=>$prov)
                <option value="{{$key}}" @if (!empty($data) && $data->provinsi_id==$key) selected @endif>{{$prov}}
                </option>
                @endforeach
            </select>
            {{-- @error('provinsi_id')
                    <div id="cemail-error" class="error">{{ $message }}</div>
        @enderror --}}
    </div>
    <div class="input-field">
        {!! Form::text('nama_kabupaten', !empty($data) ? $data['nama_kabupaten'] : '', ['class' =>
        $errors->has('nama_kabupaten') ? 'invalid' : '']) !!}
        <label for="nama_kabupaten">Nama Kabupaten</label>
        {{-- @error('nama_kabupaten')
                    <div id="cemail-error" class="error">{{ $message }}</div>
    @enderror --}}
    </div>
    <button type="submit" class="btn btn-primary">Submit!</button>
</form>
@endsection
