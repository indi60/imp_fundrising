<a href="/donatur/lihat_project"
style="background: #3a7bd5;  /* fallback for old browsers */
 background: -webkit-linear-gradient(to right, #3a6073, #3a7bd5);  /* Chrome 10-25, Safari 5.1-6 */
 background: linear-gradient(to right, #3a6073, #3a7bd5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ margin-right:5px;"
 id="float" class="btn btn-primary text-light">Kembali</a>
 @foreach ($mproject as $mpjek)
<br>
        <div class="oc-item">
            <div class="real-estate-item">
                <div class="real-estate-item-image">
                    <h4 class="badge badge-danger badge-pill">Tanggal Ditutup : {{$mpjek->tanggal_ditutup}}</h4>
                    
                    <a href="/donatur/lihat_project/{{$mpjek->id}}">
                        <?php echo substr($mpjek->konten, 0, 300) ?>
                    </a>
                    <div class="real-estate-item-price">
                        Target :
                        Rp. <?php echo number_format($mpjek->target,0,'.','.') ?><span></span>
                    </div>
                </div>
                <div class="real-estate-item-desc">
                    <h3><a href="/donatur/lihat_project/{{$mpjek->id}}">{{$mpjek->nama_project}}</a></h3>
                    @foreach($mkategori as $cList)
					    <span>@if ($mpjek->kategori_project==$cList->id){{$cList->kategori_project}} @endif</span>
                    @endforeach

                    <a href="/donatur/lihat_project/{{$mpjek->id}}"class="btn btn-info btn-sm">Lihat</a>

                    <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>
                    
                    <div class="real-estate-item-features t500 font-primary clearfix">
                        <div class="row no-gutters">
                            <div class="col-lg-4 nopadding">Terkumpul <span class="color">{{$mpjek->terkumpul}}</span></div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
@endforeach