@extends('partial.main')
@section('title', 'Donatur | Update Project')
@section('content')
<div class="container">
    <div class="content-wrap">

				<div class="container clearfix">

						<div class="form-result"></div>

						<div class="row">
							<div class="col-lg-12">
                                <form action="/donatur/donasi_project/{{$refdproject->id}}" method="POST" enctype="multipart/form-data">
									@method('PUT')
									@csrf
                                    
									<div class="form-group">
										<label>Bukti Transfer</label><br>
										<?php $path = Storage::url($refdproject->bukti_transfer); ?>
										<th><img width="500px" src="{{ url($path) }}" alt="" srcset=""></th>
										{{-- <img  width="500px" src='{{ asset('uploads/donasi_project/'.$refdproject->bukti_transfer) }}'> --}}
										{{-- <th><a href="{{ url($path) }}">Donwload Now</a></th> --}}
										<input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control required">
                                    </div>
                                    <div class="row justify-content-end">
										<div class="col-md-2">
											<button type="submit" class="btn btn-primary">UPLOAD BUKTI</button>
										</div>
										<a href="/donatur/donasi_project" class="btn btn-danger">KEMBALI</a>
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