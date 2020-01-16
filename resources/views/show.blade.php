@extends('partial.main')
@section('title', 'Show')
@section('content')
<div class="container">
	<div class="card text-center">
		<div class="card-header">
			{{$mproject->kategori_project}}
		</div>
		<div class="card-body">
		  <h5 class="card-title">
			{{$mproject->nama_project}}</h5>
		  <p class="card-text">
			{!!$mproject->konten!!}</p>
		  <a href="/donatur/donasi_project/{{$mproject->id}}" class="btn btn-primary">DONASI SEKARANG</a>
		</div>
		<div class="card-footer text-muted">
			Target : Rp. <?php echo number_format($mproject->target,0,'.','.') ?> <br>
			Terkumpul : Rp. <?php echo number_format($mproject->terkumpul,0,'.','.') ?> <br>
			Tanggal Di Tutup <?php echo date("d/m/Y", strtotime($mproject->tanggal_ditutup));
			?><br>
		</div>
	  </div>
</div>
@endsection
