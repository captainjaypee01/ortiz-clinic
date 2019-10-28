@extends('backend.layouts.app')

@section('title', 'Service Management' . ' | ' . 'Create Service')

@section('content')
{{ html()->form('POST', route('admin.record.service.store'))->class('form-horizontal')->attribute("enctype","multipart/form-data")->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Service Management
                        <small class="text-muted">Create Service</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Name")->for('name') }}
                        
                        {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder('Name')
                                ->attribute('maxlength', 191)
                                ->required() }} 
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Price")->for('price') }}
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>
                </div> 
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Duration in minutes")->for('duration') }}
                        <input type="number" name="duration" id="duration" class="form-control" required>
                    </div>
                </div> 
            </div>

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Description")->for('description') }}
                        {{ html()->textarea('description')
                                ->class('form-control')
                                ->placeholder('Description')
                                ->attribute('rows', 15)
                                ->required() }}  
                    </div>
                </div> 
            </div>
            
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Image Upload")->for('upload_file') }}
                        {{ html()->file('upload_file')
                                ->class('form-control')  
                                ->required() }}  
                    </div>
                </div> 
            </div>
            <div class="row">
                
                <div class="col col-sm-12">
                    <div class="form-group">
                        <p class = "mb-2"> Preview Uploaded Photo </p>
                        <img src="" alt="Preview Upload" id="imagePayment" class="img w-100">
                    </div>
                </div> 
            </div>

 

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.record.service.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection

@push('after-scripts')
<script>
function readURL(input) {

if (input.files && input.files[0]) {
    var reader = new FileReader();
    // Get Image size
    // var fileInput = $(this).find("#imgInp")[0],
    //     file = fileInput.files && fileInput.files[0];
    var file = input.files && input.files[0];
    if( file ) {
        var img = new Image();

        img.src = window.URL.createObjectURL( file );

        img.onload = function() {
            var width = img.naturalWidth,
                height = img.naturalHeight;

            window.URL.revokeObjectURL( img.src );

            reader.onload = function(e) {
                console.log(e);
                $('#imagePayment').attr('src', e.target.result);
                $("#blah").hide();
                $("#imagePayment").show();
                // $("#imagePayment").css('background-image','url('+ e.target.result + ')'); 
                // $("#imagePayment").css('height',"350px");
                // $("#imagePayment").css('width',"350px");
            }
            reader.readAsDataURL(input.files[0]);
        };
    }
    

}
}

$(document).on("change", "#upload_file",function() {
    readURL(this);
});
</script>
@endpush