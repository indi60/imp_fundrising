@extends('partial.main')
@section('title', 'Project Owner | Form Project')
@section('content')
<div class="container">
    <div class="content-wrap">
				<div class="container clearfix">
						<div class="form-result"></div>
						<div class="row">
							<div class="col-lg-12">
                                <form action="{{ empty($data) ? ('/powner/create_project') : ('/powner/create_project/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
										@if( !empty($data) )
										<input type="hidden" name="_method" value="PUT">
										@endif
									<div class="form-group">
										<label>Kategori Project</label>
										<select name="kategori_project" id="kategori_project" class="form-control custom-select
										" required>
                                            <option value="" selected disabled >PILIH KATEGORI</option>
                                            @foreach ($kategori as $key=>$kat)
                                            <option value="{{$key}}" @if (!empty($data) && $data->kategori_project==$key) selected @endif>{{$kat}}
                                            </option>
                                            @endforeach
                                        </select>
									</div>
									<div class="form-group">
										<label>Nama Project</label>
									<input type="text" name="nama_project" id="nama_project" class="form-control required" @if (!empty($data)) value="{{$data->nama_project}}"@endif>
									</div>
									<div class="form-group">
										<label>Konten</label>
										<textarea name="konten" id="konten" cols="30" rows="10" class="form-control required">@if (!empty($data)){!!$data->konten!!}@endif</textarea>
									</div>
									<div class="form-group">
										<label>Target</label>
										<input type="text" name="target" id="target" placeholder="000.000.000" class="form-control required" @if (!empty($data)) value="{{$data->target}}"@endif>
									</div>
									{{-- <div class="form-group">
										<label>Terkumpul</label>
										<input type="number" name="terkumpul" id="terkumpul" class="form-control required" @if (!empty($data)) value="{{$data->terkumpul}}"@endif>
									</div>                                     --}}
									{{-- <div class="form-group">
										<label>Tanggal Dibuka</label>
										<input type="date" name="tanggal_dibuka" id="tanggal_dibuka" class="form-control required" @if (!empty($data)) value="{{$data->tanggal_dibuka}}"@endif>
									</div> --}}
									<div class="form-group">
										<label>Tanggal Tutup</label>
										<input name="tanggal_ditutup" id="tanggal_ditutup" class="form-control required" placeholder="yyyy/mm/dd" readonly @if (!empty($data)) value="{{$data->tanggal_ditutup}}"@endif>
									</div>
			
									{{-- <div class="form-group">
										<label>Status</label>
										<input type="number" name="status" id="status" class="form-control required" @if (!empty($data)) value="{{$data->status}}"@endif>
									</div> --}}
									<div class="form-group">
										<input type="hidden" name="owner_id" id="owner_id" class="form-control required" value="{{Auth()->user()->id}}">
									</div>
                                    
                                    <div class="col-12">
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
    //ckeditor konten
	CKEDITOR.replace('konten', {
        filebrowserUploadUrl: "{{route('ckeditor/upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
	//mata uang
	$(document).ready(function(){
	$( '#target' ).mask('000.000.000', {reverse: true});
	});
	//datepicker
	$('#tanggal_ditutup').datepicker({
			format : 'yyyy/mm/dd',
            uiLibrary: 'bootstrap4'
        });
</script>
@endsection