@extends('partial.main')
@section('title', 'Admin | Cek Project')
@section('content')
<div class="container">	
    <div class="content-wrap">
				<div class="container clearfix">
						<div class="form-result"></div>
						<div class="row">
							<div class="col-lg-12">
								
								<form action="{{ empty($data) ? ('/admin/list_owner_project') : ('/admin/list_owner_project/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
									@if( !empty($data) )
									<input type="hidden" name="_method" value="PUT">
									@endif
									<div class="row justify-content-end">
									<a href="/admin/list_owner_project" class="btn btn-danger">KEMBALI</a>
									</div>
									@foreach ($user as $ke => $us)
									@if ($data->owner_id==$ke)<h3>Post By {{$us}}</h3>@endif
									@endforeach
									<div class="form-group">
										<label>Kategori Project</label>
										<select name="kategori_project" id="kategori_project" class="form-control custom-select" required>
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
										<label>Tumbnail</label> <br>
									@if (!empty($data)) <?php $path = Storage::url($data->tumbnail); ?> 
                            		<th><img width="500px" src="{{ url($path) }}" alt="" srcset=""></th> @endif
									</div>
									<div class="form-group">
										<label>Konten</label>
										<textarea name="konten" id="konten" cols="30" rows="10" class="form-control required">@if (!empty($data)){!!$data->konten!!}@endif</textarea>
									</div>
									<div class="form-group">
										<label>Target</label>
										<input type="text" name="target" id="target" placeholder="000.000.000" class="form-control required" @if (!empty($data)) value="{{$data->target}}"@endif>
									</div>
									<div class="form-group">
										<label>Tanggal Tutup</label>
										<input name="tanggal_ditutup" id="tanggal_ditutup" class="form-control required" placeholder="yyyy/mm/dd" readonly @if (!empty($data)) value="{{$data->tanggal_ditutup}}"@endif>
									</div>	
									<div class="form-group">
										<label for="">Gallery</label>
										<div class="row">
										<?php $gallery = explode(',', $data->gallery) ?>
										@foreach ($gallery as $item)
								
										<div class="col-lg-3 col-md-4 col-6">
											<a href="{{ asset('/uploads/gallery/'.$item) }}" class="d-block mb-4 h-100">			
											<img class="img-fluid img-thumbnail" src="{{ asset('/uploads/gallery/'.$item) }}" alt="">
											</a>
										</div>
										@endforeach	 
									</div>						
							</div>		
								<div class="row justify-content-end">
                                    <div class="text-right mr-2">
										<button type="submit" value="1" name="status" class="btn btn-primary">TERIMA</button>
										<button type="submit" value="2" name="status" class="btn btn-warning">TOLAK</button>
									</div>
								</form>
								<form action="/admin/list_owner_project/{{ $data->id }} " method="post">
									@method('delete')
									@csrf
									<button onclick="return confirm('Yakin Hapus?')" type="submit" class="btn btn-danger">DELETE PROJECT</button>
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
        filebrowserUploadUrl: "{{route('ckeditor/uploadd', ['_token' => csrf_token() ])}}",
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