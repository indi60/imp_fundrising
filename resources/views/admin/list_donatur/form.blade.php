@extends('partial.main')
@section('title', 'Admin | Update Project')
@section('content')
<div class="container">
    <div class="content-wrap">

				<div class="container clearfix">

						<div class="form-result"></div>

						<div class="row">
							<div class="col-lg-12">
                                <form action="/admin/list_donatur/{{$refdproject->id}}" method="POST" enctype="multipart/form-data">
									@method('PUT')
									@csrf
									@foreach ($mcproject as $key=>$pr)

									<input type="hidden" @if ($refdproject->project_id==$key) name="id_projek" value="{{$key}}"@endif>
										
									@endforeach
									
									<div class="row justify-content-end">
										<a href="/admin/list_donatur" class="btn btn-danger">KEMBALI</a>
										</div>
									<div class="form-group">
										<label>Nama Project</label>
									<input type="text" class="form-control required" @foreach ($mcproject as $key=>$mcp) @if ($refdproject->project_id) value="{{$mcp}}" @endif @endforeach readonly>
									<input type="hidden" name="project_id" id="project_id" class="form-control required" value="{{$refdproject->project_id}}">
                                    </div>
                                    <input type="hidden" name="owner_id" id="owner_id" class="form-control required" value="{{$refdproject->owner_id}}">
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <select name="bank_id" id="bank_id" class="form-control custom-select" required>
                                            <option value="" selected disabled>PILIH BANK</option>
                                            @foreach ($refbank as $key =>$rbank)
                                                <option value="{{$key}}" @if ($refdproject->bank_id == $key) selected @endif>{{$rbank}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="form-group">
										<label>Donasi</label>
										<input type="text" name="donasi" id="donasi" class="form-control required" value="{{$refdproject->donasi}}">
                                    </div>
                                    
									<div class="form-group">
										<label>Bukti Transfer</label><br>
										{{-- <img  width="500px" src='{{ asset('uploads/donasi_project/'.$refdproject->bukti_transfer) }}'> --}}
										<?php $path = Storage::url($refdproject->bukti_transfer); ?>
										<th><img width="500px" src="{{ url($path) }}" alt="" srcset=""></th>
										{{-- <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control required"> --}}
                                    </div>
                                    <div class="row justify-content-end">
										<div class="col-md-2">
											<button type="submit" value="1" name="status" class="btn btn-primary">TERIMA</button>
											<button type="submit" value="2" name="status" class="btn btn-warning">TOLAK</button>
										</div>
									</form>
									<form action="/admin/list_donatur/{{ $refdproject->id }} " method="post">
										@method('delete')
										@csrf
										<button onclick="return confirm('Yakin Hapus?')" type="submit" class="btn btn-danger">DELETE DONASI</button>
									</form>
								</div>
									
							</div>
						</div>

				</div>

			</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	// //mata uang
	$(document).ready(function(){
	$( '#donasi' ).mask('000.000.000', {reverse: true});
	});
</script>
@endsection