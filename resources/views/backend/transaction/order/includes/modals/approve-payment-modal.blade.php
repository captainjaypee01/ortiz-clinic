

<div class="modal fade login-modal" id="approve-payment-modal" tabindex="-1" role="dialog" aria-labelledby="approve-payment-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    Approve Payment
                </div>
                
                {{ html()->form('POST', route('admin.transaction.order.approve', $order))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                <div class="modal-body">
                    <div class="containerlogin-wrapper">  
                        <hr>
                        
                         <div class="row  mt-4 text-center ">
                             <div class="col">
                                 <h3 class="text-title">ARE YOU SURE YOU WANT TO APPROVE THIS PAYMENT?</h3>
                             </div>
                         </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <div class="col">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div><!--col-->
    
                    <div class="col text-right">
                        {{ form_submit('Approve') }}
                    </div><!--col-->
                </div>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
    
    
    