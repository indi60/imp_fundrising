@extends('partial.main')
@section('title', auth()->user()->name.' | Alasan')
@section('content')
<div class="container">
    <div class="content-wrap">

				<div class="container clearfix">

						<div class="form-result"></div>

						<div class="row">
							<div class="col-lg-12">
								{{-- {{$refdproject->id}} --}}
                                <form action="{{ empty($data) ? ('/admin/list_owner_project') : ('/admin/list_owner_project/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
									@if( !empty($data) )
									<input type="hidden" name="_method" value="PUT">
									@endif
									<input type="hidden" name="kategori_project" id="kategori_project" class="form-control required" @if (!empty($data)) value="{{$data->kategori_project}}"@endif>
									<input type="hidden" name="nama_project" id="nama_project" class="form-control required" @if (!empty($data)) value="{{$data->nama_project}}"@endif>
									<input type="hidden"  name="konten" id="konten" cols="30" rows="10" class="form-control required" @if (!empty($data)) value="{{$data->konten}}"@endif>							
									<input type="hidden" name="target" id="target" placeholder="000.000.000" class="form-control required" @if (!empty($data)) value="{{$data->target}}"@endif>
									<input type="hidden" name="tanggal_ditutup" id="tanggal_ditutup" class="form-control required" placeholder="yyyy/mm/dd" readonly @if (!empty($data)) value="{{$data->tanggal_ditutup}}"@endif>
																	
									<h1>Tulisan Alasan</h1>
                                    <div class="form-group">
										<label>Alasan</label>
										<textarea name="alasan" class="form-control" id="" cols="30" rows="10"></textarea>
									</div>
                                    <div class="row justify-content-end">
										<div class="col-md-1">
											<button type="submit" value="2" name="status" class="btn btn-primary">Kirim</button>
										</div>
										<a href="/admin/list_owner_project/{{$data->id}}/edit" class="btn btn-danger">Kembali</a>
									</div>
									</form>
									
							</div>
						</div>

				</div>

			</div>
</div>
@endsection