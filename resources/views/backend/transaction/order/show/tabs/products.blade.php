
@if(count($orderProducts) > 0)
<div class="col">
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
                    @foreach($orderProducts as $product)
                    <?php $totalAmount +=  ($product->price * $product->pivot->quantity); ?>
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
            <h3 class="font-weight-bolder text-capitalize">Total Amount : <span class="badge badge-success"> {{ "P" . number_format($totalAmount, 2,".",",") }}</span></h3>
        </div>
    </div>
</div><!--table-responsive-->
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



