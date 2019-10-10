
<div class="row">
    <div class="col">
        @if($reservation->payment_location)
        
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reject-payment-modal">
                Reject  Payment
            </button>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve-payment-modal">
            Approve Payment
        </button>
        <br>
        <br>
        @include('backend.transaction.reservation.includes.modals.approve-payment-modal')
        @include('backend.transaction.reservation.includes.modals.reject-payment-modal')
        <img src="{{ $reservation->format_payment_location }}" alt="No image uploaded">
        
        @else
            <div class="text-center">
                <h1 class="display-4">Oops..</h1>
                <p class="lead"><strong>Payment is not yet uploaded.</strong></p>
            </div>
        @endif
    </div>
</div>