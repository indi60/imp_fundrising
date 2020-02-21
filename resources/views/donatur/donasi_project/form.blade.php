@extends('partial.main')
@section('title', auth()->user()->name.' | Donasi Project')
@section('content')
<div class="container">
    <div class="content-wrap">

				<div class="container clearfix">

						<div class="form-result"></div>

						<div class="row">
							<div class="col-lg-12">
                                <form action="/donatur/donasi_project/" method="POST" enctype="multipart/form-data">
                                    @csrf
									<div class="form-group">
										<label>Nama Project</label>
									<input type="text" class="form-control required" value="{{$mcproject->nama_project}}" readonly>
									<input type="hidden" name="project_id" id="project_id" class="form-control required" value="{{$mcproject->id}}">
                                    </div>
                                    <input type="hidden" name="owner_id" id="owner_id" class="form-control required" value="{{$mcproject->owner_id}}">
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <select name="bank_id" id="bank_id" class="form-control custom-select" required>
                                            <option value="" selected disabled>PILIH BANK</option>
                                            @foreach ($refbank as $key =>$rbank)
                                                <option value="{{$key}}">{{$rbank}}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="form-group">
										<label>Donasi</label>
										<input type="text" placeholder="000.000.000" name="donasi" id="donasi" class="form-control required">
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
	// //mata uang
	$(document).ready(function(){
	$( '#donasi' ).mask('000.000.000', {reverse: true});
	});
</script>
@endsection