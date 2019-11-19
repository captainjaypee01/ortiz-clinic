

<div class="modal fade login-modal" id="upload-res-payment-modal" tabindex="-1" role="dialog" aria-labelledby="upload-res-payment-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                Upload Payment
            </div>
            
            {{ html()->form('POST', route('frontend.transaction.reservation.upload', $reservation))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
            <div class="modal-body">
                <div class="containerlogin-wrapper">  
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                    {{ html()->label("Upload File")->for('upload_file') }}
                                <input type="file" name="upload_file" id="upload_file" class="form-control">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> 
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit('Upload') }}
                </div><!--col-->
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
