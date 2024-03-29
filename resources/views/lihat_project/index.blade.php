@extends('partial.main')
@section('title', auth()->user()->name.' | Lihat Project')
@section('content')
<div class="greyBg">
    <div class="container">
        <div class="wrapper">
            <h1 class="text-center"></h1>
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <select class="form-control" id="tes">
                        <option selected disabled >Select a Category</option>
                        @foreach($mkategori as $cList)
						<option id="cat{{$cList->id}}" value="{{$cList->id}}">{{$cList->kategori_project}}</option>
                        @endforeach
					</select>
                </div>

                {{-- @endif --}}
            </div>
            <div class="row top25">
                <div id="projectData">
                    <div class="container">
                        <div class="text" id="list">
                            <h2  style="margin-top:20px">List Project</h2>
						</div>
						<div style="position: relative;">
							<div class="real-estate owl-carousel image-carousel carousel-widget bottommargin-lg" data-margin="10" data-nav="true" data-loop="false" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="3" data-items-xl="3">
							
								@foreach ($mproject as $mpjek)
								<div class="oc-item">
									<div class="real-estate-item">
										<div class="real-estate-item-image">
											<h4 class="badge badge-danger badge-pill">Tanggal Ditutup : {{$mpjek->tanggal_ditutup}}</h4>
											
											<a href="/{{$mpjek->id}}/show">
												<?php $path = Storage::url($mpjek->tumbnail); ?>
												<img width="500px" height="300px" src="{{ url($path) }}" alt="" srcset="">
											</a>
											<div class="real-estate-item-price">
												Target :
												Rp. <?php echo number_format($mpjek->target,0,'.','.') ?><span></span>
											</div>
										</div>
										<div class="real-estate-item-desc">
											<h3><a href="/{{$mpjek->id}}/show">{{$mpjek->nama_project}}</a></h3>
											<span>{{$mpjek->kategori_project}}</span>
	
											<a href="/{{$mpjek->id}}/show"class="btn btn-info btn-sm">Lihat</a>
	
											<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>
											
											<div class="real-estate-item-features t500 font-primary clearfix">
												<div class="row no-gutters">
													<div class="">Terkumpul <span class="color"> Rp. <?php echo number_format($mpjek->terkumpul,0,'.','.') ?></span></div>
												</div>
												<br>
											</div>
										</div>
									</div>
								</div>
								@endforeach
						</div>
					</div>
                </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>

@stop
@section('scripts')
<script type="text/javascript">	
		$(document).ready(function(){
			$("#tes").change(function(){
				var cat = $("#tes").val();
                
                //ajax
                $.ajax({
                    type: "GET",
                    dataType: 'html',
                    url: "{{route('projectCat')}}",
                    data: "kategori_project=" + cat,
                    success:function (response) {
                        console.log(response);
                        $('#projectData').html(response);
                    }
                })
			});
		});
		
</script>
@endsection
