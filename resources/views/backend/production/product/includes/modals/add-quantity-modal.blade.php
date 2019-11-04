

<div class="modal fade login-modal" id="add-quantity-modal" tabindex="-1" role="dialog" aria-labelledby="add-quantity-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                Add Quantity
            </div>
            
            {{ html()->form('POST', route('admin.production.product.add.quantity'))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
            <div class="modal-body">
                <div class="container-fluid login-wrapper"> 
                    <input type="hidden" name="product" id="product" value="">
                    <div class="row"> 
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label("Quantity")->for('quantity') }}
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                        </div>
                    </div> 
            
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning">Submit</button>
            </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
