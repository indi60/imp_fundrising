<style>
    .modal-backdrop {
        background-color: rgba(0, 0, 0, .0001) !important;

    }

</style>
<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-kecamatan" method="post" class="form-horizontal" data-toggle="validator"
                enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <h3 class="modal-title"></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                </div>
                <br>
               <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nama_bank" class="col-md-12 control-label">Nama Bank</label>
                        <div class="col-md-12">
                            <input type="text" id="nama_bank" name="nama_bank" class="form-control"
                                required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <label for="nama_rekening" class="col-md-12 control-label">Nama Rekening</label>
                        <div class="col-md-12">
                            <input type="text" id="nama_rekening" name="nama_rekening" class="form-control"
                                required>
                            <span class="help-block with-errors"></span>
                        </div>
                        <label for="no_rekening" class="col-md-12 control-label">No Rekening</label>
                        <div class="col-md-12">
                            <input type="text" id="no_rekening" name="no_rekening" class="form-control"
                                required>
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
