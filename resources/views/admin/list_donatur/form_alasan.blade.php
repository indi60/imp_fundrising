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
                                <form action="{{ empty($data) ? ('/admin/list_donatur') : ('/admin/list_donatur/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
									@if( !empty($data) )
									<input type="hidden" name="_method" value="PUT">
									@endif
									@foreach ($mcproject as $key=>$pr)

									<input type="hidden" @if ($data->project_id==$key) name="id_projek" value="{{$key}}"@endif>
										
									@endforeach
									<input type="hidden" name="project_id" id="project_id" class="form-control required" @if (!empty($data)) value="{{$data->project_id}}"@endif>
									<input type="hidden" name="owner_id" id="owner_id" class="form-control required" @if (!empty($data)) value="{{$data->owner_id}}"@endif>
									<input type="hidden"  name="donatur_id" id="donatur_id" cols="30" rows="10" class="form-control required" @if (!empty($data)) value="{{$data->donatur_id}}"@endif>							
									<input type="hidden" name="donasi" id="donasi" placeholder="000.000.000" class="form-control required" @if (!empty($data)) value="{{$data->donasi}}"@endif>
									<input type="hidden" name="kode_unik" id="kode_unik" class="form-control required" placeholder="yyyy/mm/dd" readonly @if (!empty($data)) value="{{$data->kode_unik}}"@endif>
									<input type="hidden" name="bank_id" id="bank_id" class="form-control required" placeholder="yyyy/mm/dd" readonly @if (!empty($data)) value="{{$data->bank_id}}"@endif>
																	
									<h1>Tulis Alasan</h1>
                                    <div class="form-group">
										<label>Alasan</label>
										<textarea name="alasan" class="form-control" id="" cols="30" rows="10"></textarea>
									</div>
                                    <div class="row justify-content-end">
										<div class="col-md-1">
											<button type="submit" value="2" name="status" class="btn btn-primary">Kirim</button>
										</div>
										<a href="/admin/list_donatur/{{$data->id}}/edit" class="btn btn-danger">Kembali</a>
									</div>
									</form>
									
							</div>
						</div>

				</div>

			</div>
</div>
@endsection