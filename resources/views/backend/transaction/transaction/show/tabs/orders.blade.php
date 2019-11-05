@if($order)
<div class="row">
    <div class="col">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover"> 
                        <tr>
                            <th>Reference</th>
                            <td>{{ $order->reference_number }}</td>
                        </tr>
            
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $order->user ? $order->user->full_name : 'N/A' }}</td> 
                        </tr>
            
                        <tr>
                            <th>Total Orders</th>
                            <td>{{ $order->total_orders }}</td>
                        </tr>
                        
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ $order->format_amount }}</td>
                        </tr> 
            
                        <tr>
                            <th>Payment Status</th>
                            <td>{!! $order->status_payment !!}</td>
                        </tr> 
                        
                        <tr>
                            <th>Last Updated At</th>
                            <td>
                                @if($order->updated_at)
                                    {{ timezone()->convertToLocal($order->updated_at) }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                
                    </table>
                </div>
            </div>
        </div>
    </div><!--table-responsive-->
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                List of products
            </div>
            <div class="card-body">
                @if(count($order->products) > 0) 
                <div class="row">
                    <div class="col table-responsive">
                        <table class="table table-hover"> 
                            <thead>
                                <tr>
                                    <th>Name</th>  
                                    <th>Price</th>  
                                    <th>Quantity</th>  
                                    <th>Total Amount</th>
                                </tr>
                            </thead> 
                            <tbody> 
                                @foreach($order->products as $product)
                                <?php $orderTotalAmount +=  ($product->price * $product->pivot->quantity); ?>
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->format_price }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ "P" . number_format($product->price * $product->pivot->quantity, 2,".",",") }}</td>
                                </tr>
                                @endforeach   
            
                            </tbody>
                
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bolder text-capitalize">Total Amount : <span class="badge badge-success"> {{ "P" . number_format($orderTotalAmount, 2,".",",") }}</span></h3>
                    </div>
                </div> 
                @else
                    <div class="row align-items-center justify-content-md-center">
                        <div class="col-lg-3 col-xl-2 text-center">
                            <img src="{{ asset('img/frontend/no_data.png') }}" height="200" class="mt-4">
                        </div>
                        <div class="col-lg-3 text-center">
                            <h1 class="display-4">Oops..</h1>
                            <p class="lead"><strong>There are no Products ordered here.</strong></p>
                        </div>
                    </div>
                @endif
                
                
                    
            </div>
        </div>
    </div>
</div>

@include('backend.transaction.order.includes.modals.approve-payment-modal')
@include('backend.transaction.order.includes.modals.reject-payment-modal')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Payment
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <img src="{{  $order->format_payment_location }}" alt="No image uploaded">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col"> 
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reject-payment-modal">
                            Reject  Payment
                        </button>
                    </div>
                    <div class="col text-right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approve-payment-modal">
                            Approve Payment
                        </button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col text-center">
        <h1 class="display-4">Oops..</h1>
        <p class="lead"><strong>There are no orders.</strong></p>
    </div>
</div>
@endif