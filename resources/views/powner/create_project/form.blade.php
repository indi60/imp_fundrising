@extends('partial.main')
@section('title', auth()->user()->name.' | Form Project')
@section('content')
<div class="container">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-12">
                    <form
                        action="{{ empty($data) ? ('/powner/create_project') : ('/powner/create_project/'.$data->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if( !empty($data) )
                        <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="row justify-content-end">
                        </div>
                        <div class="form-group">
                            <label>Kategori Project</label>
                            <select name="kategori_project" id="kategori_project" class="form-control custom-select" required>
                                <option value="" selected disabled>PILIH KATEGORI</option>
                                @foreach ($kategori as $key=>$kat)
                                <option value="{{$key}}" @if (!empty($data) && $data->kategori_project==$key) selected
                                    @endif>{{$kat}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" name="nama_project" id="nama_project" class="form-control required" @if(!empty($data)) value="{{$data->nama_project}}" @endif>
                        </div>
                        <div class="form-group">
                            <label>Tumbnail</label><br>
                            @if (!empty($data)) <?php $path = Storage::url($data->tumbnail); ?> 
                            <th><img width="500px" src="{{ url($path) }}" alt="" srcset=""></th>@endif
                            <input type="file" name="tumbnail" id="tumbnail" class="form-control "required>
                        </div>
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea name="konten" id="konten" cols="30" rows="10"
                                class="form-control required">@if (!empty($data)){!!$data->konten!!}@endif</textarea>
                        <div class="form-group">
                            <label>Target</label>
                            <input type="text" name="target" id="target" placeholder="000.000.000"
                                class="form-control required" @if (!empty($data)) value="{{$data->target}}" @endif>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Tutup</label>
                            <input name="tanggal_ditutup" id="tanggal_ditutup" class="form-control required"
                                placeholder="yyyy/mm/dd" readonly @if (!empty($data)) value="{{$data->tanggal_ditutup}}"
                                @endif>
                        </div>
                        <div class="form-group">
                            <label for="">Gallery <small>* maximum 2mb/foto</small> </label>
                            <br>
                            <input type="hidden" autocomplete="OFF" @if (!empty($data)) value="{{$data->gallery}}"
                                @endif name="gallery" id="gallery" placeholder="" class="form-control input-sm"
                                required />
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#myModal"> <i class="fa fa-image"></i> Upload Gallery</button>
                        </div>
                        <br>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/powner/create_project" class="btn btn-danger">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- MODAL START -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Images</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" class="dropzone" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- MODAL END -->
@endsection
@section('scripts')
<script type="text/javascript">
    //ckeditor konten
    CKEDITOR.replace('konten', {
        filebrowserUploadUrl: "{{route('ckeditor/upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    //mata uang
    $(document).ready(function () {
        $('#target').mask('000.000.000', {
            reverse: true
        });
    });
    //datepicker
    $('#tanggal_ditutup').datepicker({
        format: 'yyyy/mm/dd',
        uiLibrary: 'bootstrap4'
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Dropzone.autoDiscover = false;
    var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
    // imageDataArray variable to set value in crud form
    var imageDataArray = new Array;
    // fileList variable to store current files index and name
    var fileList = new Array;
    var i = 0;
    $(function () {
        uploader = new Dropzone(".dropzone", {
            url: "{{url('powner/item/image/upload')}}",
            paramName: "file",
            uploadMultiple: false,
            acceptedFiles: "image/*,video/*,audio/*",
            addRemoveLinks: true,
            forceFallback: false,
            maxFilesize: 256, // Set the maximum file size to 256 MB
            parallelUploads: 100,
            timeout: 180000,
        }); //end drop zone
        uploader.on("success", function (file, response) {
            imageDataArray.push(response)
            fileList[i] = {
                "serverFileName": response,
                "fileName": file.name,
                "fileId": i
            };

            i += 1;
            $('#gallery').val(imageDataArray);
        });
        uploader.on("removedfile", function (file) {
            var rmvFile = "";
            for (var f = 0; f < fileList.length; f++) {
                if (fileList[f].fileName == file.name) {
                    // remove file from original array by database image name
                    imageDataArray.splice(imageDataArray.indexOf(fileList[f].serverFileName), 1);
                    $('#gallery').val(imageDataArray);
                    // get removed database file name
                    rmvFile = fileList[f].serverFileName;
                    // get request to remove the uploaded file from server
                    $.get("{{url('powner/item/image/delete')}}", {
                            file: rmvFile
                        })
                        .done(function (data) {
                            //console.log(data)
                        });
                    // reset imageDataArray variable to set value in crud form

                    console.log(imageDataArray)
                }
            }

        });
    });

</script>
@endsection
