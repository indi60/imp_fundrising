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
									<div class="form-group">
										<label>Status</label>
										<select name="status" id="status" class="form-control custom-select" required>
											<option value="0" @if (!empty($refdproject) && $refdproject->status==0) selected @endif>TOLAK</option>
											<option value="1" @if (!empty($refdproject) && $refdproject->status==1) selected @endif>KONFIRMASI</option>
										</select>
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
										<img  width="500px" src='{{ asset('uploads/donasi_project/'.$refdproject->bukti_transfer) }}'>
										{{-- <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control required"> --}}
                                    </div>
                                    <div class="row justify-content-end">
										<div class="col-md-2">
											<button type="submit" class="btn btn-primary">UPDATE PROJECT</button>
										</div>
									</form>
									<a href="/admin/list_donatur" class="btn btn-danger">KEMBALI</a>
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