@extends('partial.main')
@section('title', 'Show')
@section('content')
<div class="container mt-3">
	<div class="card mt-5 mb-5 text-center">
		<div class="card-header text-left">Kategori :
			{{$mproject->kategori_project}}
		</div>
		<div class="card-body">
		  <h4 class="card-title">
			{{$mproject->nama_project}}</h4>
		  <p class="card-text">
			{!!$mproject->konten!!}</p>
			
		  	<a href="/donatur/lihat_project/{{$mproject->id}}/gallery" class="btn btn-danger bgcolor-2 btn-sm">Lihat Gallery</a>
		  <a href="/donatur/donasi_project/{{$mproject->id}}" class="btn btn-primary btn-sm">Donasi Sekarang</a>
		</div>
		<div class="card-footer text-muted">
			<div class="row">
				<div class="col-md-4">
					Target : Rp. <?php echo number_format($mproject->target,0,'.','.') ?> 
				</div>
					<div class="col-md-4">
						Terkumpul : Rp. <?php echo number_format($mproject->terkumpul,0,'.','.') ?>
					</div>
						<div class="col-md-4">
							Tanggal Di Tutup <?php echo date("d/m/Y", strtotime($mproject->tanggal_ditutup));?>
						</div>
			</div>
		</div>
	</div>
</div>
@endsection
