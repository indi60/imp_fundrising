<style>
.modal-backdrop {
     background-color: rgba(0,0,0,.0001) !important;
}
</style>
<div class="modal"  id="modal-form" role="dialog" aria-hidden="true" data-backdrop="static">
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
                    <label for="provinsi_id" class="col-md-4 control-label">Nama Provinsi </label>
                    <div class="col-md-6">
                    <select id="provinsi_id" name="provinsi_id" required>
                        <option value="" selected disabled>PILIH PROVINSI</option>
                        @foreach ($provinsi as $key=>$prov)
                        <option value="{{$key}}" @if (!empty($data) && $data->provinsi_id==$key) selected @endif>{{$prov}}
                        </option>
                        @endforeach
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Nama Kabupaten</label>
                    <div class="col-md-6">
                    <select id="kabupaten_id" name="kabupaten_id" required>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Nama Kecamatan</label>
                    <div class="col-md-6">
                    <select id="kecamatan_id" name="kecamatan_id" required>
                    </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="title" class="col-md-4 control-label">Nama Kelurahan</label>
                      <div class="col-md-6">
                          <input type="nama_kelurahan" id="nama_kelurahan" name="nama_kelurahan" class="form-control" required>
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

