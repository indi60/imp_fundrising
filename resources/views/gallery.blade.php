@extends('partial.main')
@if (Auth::user() == null)
@section ('title',  'Gallery Project')
@else
@section ('title',  Auth::user()->name.' | Gallery Project')
@endif
@section('content')
<br>
<!-- Page Content -->
<div class="container">
	<div class="row">
	<div class="col-md-6">
	<h1 class=" font-weight-light text-center text-lg-left mt-4 mb-0">Gallery Project</h1>
	</div>
	<div class="col-md-6 mt-4">
	<a href="/{{$mproject->id}}/show"
            style="background: #3a7bd5;  /* fallback for old browsers */
                    background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to right, #3a6073, #3a7bd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
					id="float" class="btn btn-primary text-light">Kembali</a>
	</div>
	</div>
	<hr class="mt-2 mb-5">	
  
	<div class="row text-center">
		@if ($mproject->gallery == null)
		<h1 class="col-md-12">Project Ini Tidak Mempunyai Gallery</h1>
		@endif
		<?php $gallery = explode(',', $mproject->gallery) ?>
		@foreach ($gallery as $item)
  
	  <div class="col-lg-3 col-md-4 col-6">
		<a href="{{ asset('/uploads/gallery/'.$item) }}" class="d-block mb-4 h-100">			
		<img class="img-fluid img-thumbnail" src="{{ asset('/uploads/gallery/'.$item) }}" alt="">
		</a>
	  </div>
		@endforeach	  
	  
	</div>
  
</div>
  <!-- /.container -->
  
@endsection

