
<div class="row">
    <div class="col">
        @if($order->payment_location)
        
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reject-payment-modal">
                Reject  Payment
            </button>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve-payment-modal">
            Approve Payment
        </button>
        <br>
        <br>
        @include('backend.transaction.order.includes.modals.approve-payment-modal')
        @include('backend.transaction.order.includes.modals.reject-payment-modal')
        <img src="{{ $order->format_payment_location }}" alt="No image uploaded">
        
        @else
            <div class="text-center">
                <h1 class="display-4">Oops..</h1>
                <p class="lead"><strong>Payment is not yet uploaded.</strong></p>
            </div>
        @endif
    </div>
</div>