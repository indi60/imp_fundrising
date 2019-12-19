<style>
    .modal-backdrop {
         background-color: rgba(0,0,0,.0001) !important;
    }
    </style>
    <div class="modal"  id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form-kecamatan" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                        </button>
                        <h3 class="modal-title"></h3>
                    </div>
    
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                        <label for="nama_provinsi" class="col-md-4 control-label">Nama Provinsi</label>
                        <div class="col-md-6">
                        <select name="provinsi_id" id="provinsi_id" required>
                            @foreach ($provinsi as $key=>$prov)
                            <option value="{{$key}}" @if (!empty($data) && $data->provinsi_id==$key) selected @endif>{{$prov}}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class="form-group">
                          <label for="nama_kabupaten" class="col-md-4 control-label">Nama Kabupaten</label>
                          <div class="col-md-6">
                              <input type="nama_kabupaten" id="nama_kabupaten" name="nama_kabupaten" class="form-control" required>
                              <span class="help-block with-errors"></span>
                          </div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
    
                </form>
            </div>
        </div>
    </div>