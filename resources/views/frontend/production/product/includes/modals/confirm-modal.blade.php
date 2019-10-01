

<div class="modal fade login-modal" id="order-product-modal" tabindex="-1" role="dialog" aria-labelledby="order-product-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    ORDER PRODUCT
                </div>
                
                {{ html()->form('POST', route('frontend.production.product.order', $product))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                <div class="modal-body">
                    <div class="containerlogin-wrapper"> 
                        <input type="hidden" name="location" value="{{ $product->id }}"> 
                        <div class="row"> 
                            <label class="col-sm-2 col-form-label"for="">Quantity</label> 
                            <div class="col"> 
                                <input type="number" name="quantity" id="quantity" class="form-control"> 
                            </div>
                        </div>
                        <hr>
                         <div class="row  mt-4 text-center ">
                             <div class="col">
                                 <h3 class="text-title">ARE YOU SURE YOU WANT TO ORDER THIS PRODUCT?</h3>
                             </div>
                         </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class="col">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div><!--col-->
    
                    <div class="col text-right">
                        {{ form_submit('Order') }}
                    </div><!--col-->
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
    