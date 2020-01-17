
@foreach ($mproject as $mpjek)
            
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
                    <span>{{$mpjek->kategori_project}}</span>

                    <a href="/donatur/lihat_project/{{$mpjek->id}}" class="real-estate-item-link"><i class="icon-info"></i></a>

                    <div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>
                    
                    <div class="real-estate-item-features t500 font-primary clearfix">
                        <div class="row no-gutters">
                            <div class="col-lg-4 nopadding">Terkumpul <span class="color">{{$mpjek->terkumpul}}</span></div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endforeach