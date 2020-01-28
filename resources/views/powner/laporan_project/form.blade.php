@extends('partial.main')
@section('title', 'Project Owner | Form Project')
@section('content')
<div class="container">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form
                        action="{{ empty($data) ? ('/powner/laporan_project') : ('/powner/laporan_project/'.$data->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if( !empty($data) )
                        <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="form-group">
                            <label>Nama Project</label>
                            <select name="project_id" id="project_id" class="form-control custom-select" required>
                                <option value="" selected disabled>PILIH PROJECT</option>
                                @foreach ($mproject as $key=>$kat)
                                <option value="{{$key}}" @if (!empty($data) && $data->project_id==$key) selected @endif>{{$kat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul Laporan</label>
                            <input type="text" name="judul_laporan" id="judul_laporan" class="form-control required" @if(!empty($data)) value="{{$data->judul_laporan}}" @endif>
                        </div>
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea name="konten_laporan" id="konten_laporan" cols="30" rows="10"
                                class="form-control required">@if (!empty($data)){!!$data->konten_laporan!!}@endif</textarea>
                        <br>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    //ckeditor konten_laporan
    CKEDITOR.replace('konten_laporan', {
        filebrowserUploadUrl: "{{route('ckeditor/laporan', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    //datepicker
    $('#tanggal_laporan').datepicker({
        format: 'yyyy/mm/dd',
        uiLibrary: 'bootstrap4'
    });

</script>
@endsection
