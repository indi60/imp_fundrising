<br>
<div class="container">
    @foreach ($mproject as $mpjek)
        <div class="oc-item">
            <div class="real-estate-item">
                <div class="real-estate-item-image">
                    <h4 class="badge badge-danger badge-pill">Tanggal Ditutup : {{$mpjek->tanggal_ditutup}}</h4>
                    
                    <a href="/{{$mpjek->id}}/show">
                        <?php $path = Storage::url($mpjek->tumbnail); ?>
                        <img width="400px" height="300px" src="{{ url($path) }}" alt="" srcset="">
                    </a>
                    <div class="real-estate-item-price">
                        Target : Rp. <?php echo number_format($mpjek->target,0,'.','.') ?><span></span>
                    </div>
                </div>
                <div class="real-estate-item-desc">
                    <h3><a href="/{{$mpjek->id}}/show">{{$mpjek->nama_project}}</a></h3>
                    @foreach($mkategori as $cList)
					    <span>@if ($mpjek->kategori_project==$cList->id){{$cList->kategori_project}} @endif</span>
                    @endforeach

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
