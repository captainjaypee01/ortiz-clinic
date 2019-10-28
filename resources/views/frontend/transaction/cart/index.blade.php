@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Cart' )

@section('content')

<div class="container">
    <div class="row mt-4">
        <!-- List of orders and reservations -->
        <div class="col col-md-8 col-sm-12">
            <div class="row mt-4">
                <div class="col">
                    <h3 class="text-title">Service</h3>
                    
                    @if(isset($cart["reservations"]) && count($cart["reservations"]) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Price</th>
                                    <th style="width:15%;">Date and Time</th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($cart["reservations"] as $reservation) 
                                <tr>
                                    <td data-th="Service">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3 hidden-xs">
                                                
                                                @if($reservation->image_location)
                                                <img src="{{ $reservation->format_image_location }}" style="max-height: 100px;max-width: 100px;" alt="..." class="img-thumbnail img-responsive"> 
                                                @else
                                                <svg class="card-img-top" style="max-width:100px;" height="100px" xmlns="http://www.w3.org/100/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>N/A</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">N/A</text></svg>
                                                @endif
                                            
                                            </div>
                                            <div class="col-sm-12 col-md-9">
                                                <h4 class="nomargin">{{ $reservation->name }}</h4>
                                                <p class="lead text-muted">{{ $reservation->duration ? $reservation->duration .' minutes' : 'N/A' }}</p> 
                                                <p>{{ $reservation->description }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">{{ $reservation->price }}</td>
                                    <td data-th="date"> 
                                        {{ $reservation->reservation_date }}
                                        <p>{{ $reservation->format_reservation_time }}</p>
                                    </td>
                                    <td class="actions" data-th=""> 
                                    <button class="btn btn-danger btn-sm btn-remove" data-type="reservations" data-id="{{ $reservation->id }}"><i class="fas fa-trash"></i></button>								
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot> 
                                <tr>
                                <td>
                                    <a href="{{ route('frontend.record.branch.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i></a></td> 
                                    <td colspan="3" class="hidden-xs"><strong>Total: P{{ number_format( array_sum(array_column($cart["reservations"],'price')), 2,".",",")  }}</strong></td>
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @else
                    <hr>
                    <p>There are no services in the cart</p>
                    @endif
                </div>
            </div>
    
            <!-- Services -->
            <div class="row mt-4">
                <div class="col">
                    <h3 class="text-title">Product</h3>
                    @if(isset($cart["products"]) && count($cart["products"]) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th width="15%">Quantity</th>
                                    <th>Sub total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart["products"] as $product) 
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 hidden-xs">
                                                @if($product->image_location)
                                                <img src="{{ $product->format_image_location }}" style="max-height: 100px;max-width: 100px;" alt="..." class="img-thumbnail img-responsive"> 
                                                @else
                                                <svg class="card-img-top" style="max-width:100px;" height="100px" xmlns="http://www.w3.org/100/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>N/A</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">N/A</text></svg>
                                                @endif
                                            </div>
                                            <div class="col-sm-12 col-md-8">
                                                <h4 class="nomargin">{{ $product->name }}</h4>
                                                <p>{{ $product->description}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price" data-price="{{ $product->price }}">{{ $product->format_price }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" value="{{ $product->quantity }}" class="form-control quantity text-center">
                                    </td>
                                    <td data-th="Subtotal" class="text-center">{{ number_format($product->price * $product->quantity, 2, ".", ",")  }}</td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-info btn-sm btn-update" data-id="{{ $product->id }}"><i class="fas fa-sync"></i></button>
                                        <button class="btn btn-danger btn-sm btn-remove" data-type="products" data-id="{{ $product->id }}"><i class="fas fa-trash"></i></button>							
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td><a href="{{ route('frontend.production.product.index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i></a></td>
                                    <td colspan="2" class="hidden-xs"></td>
                                    <td colspan="2" class="hidden-xs"><strong>Total: P{{ number_format( array_sum(array_column($cart["products"],'total_amount')), 2,".",",")  }}</strong></td> 
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @else
                    <hr>
                    <p>There are no products in the cart</p>
                    @endif
                </div>
            </div>
            
        </div>

        <!-- Second Column / Summary -->
        <div class="col">
            @if((isset($cart["products"]) && count($cart["products"]) > 0) || (isset($cart["reservations"]) && count($cart["reservations"]) > 0) )
            <div class="row">
                <div class="col">
                    <div class="container jumbotron" style="max-width: 512px;">
                        <div class="row">
                            <div class="col">
                                <h3 class="text-title">Summary</h3>
                            </div>
                        </div>
                        @if(isset($cart["reservations"]) && count($cart["reservations"]) > 0)
                        
                        <hr>
                        <div class="row">
                            <div class="col col-md-8">
                                <h4 class="text-title">Service</h4> 
                            </div>
                            <div class="col col-md-4  text-right">
                                <strong>P{{ number_format( array_sum(array_column($cart["reservations"],'price')), 2,".",",")  }} </strong>
                            </div>
                        </div>
                        @endif
                        @if(isset($cart["products"]) && count($cart["products"]) > 0)
                        <hr>
                        <div class="row">
                            <div class="col col-md-8">
                                <h4 class="text-title">Product</h4> 
                            </div>
                            <div class="col col-md-4  text-right">
                                <strong>P{{ number_format( array_sum(array_column($cart["products"],'total_amount')), 2,".",",")  }} </strong>
                            </div>
                        </div>
                        @endif

                        <hr>
                        <div class="row">
                            <div class="col col-md-6 col-sm-12">
                                <h5 class="text-title">Grand Total: </h5>  
                    
                            </div>
                            <div class="col col-md-6 col-sm-12 text-right">
                                
                                @if( (isset($cart["products"]) && count($cart["products"]) > 0) && (isset($cart["reservations"]) && count($cart["reservations"]) > 0) )
                                    <strong>P{{ number_format( array_sum(array_column($cart["products"],'total_amount')) +  array_sum(array_column($cart["reservations"],'price')), 2,".",",")  }} </strong>
                                @elseif(isset($cart["products"]) && count($cart["products"]) > 0)
                                    <strong>P{{ number_format( array_sum(array_column($cart["products"],'total_amount')), 2,".",",")  }} </strong>
                                @elseif(isset($cart["reservations"]) && count($cart["reservations"]) > 0)
                                    <strong>P{{ number_format( array_sum(array_column($cart["reservations"],'price')), 2,".",",")  }} </strong>
                                @endif 
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col text-right">
                                {{ html()->form('POST', route('frontend.transaction.cart.checkout'))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                                {{ form_submit("Checkout")->id('btn-checkout') }} <i id="checkout-loading" style="display:none;" class="fas fa-sync fa-spin"></i>
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
        
    
</div>

@endsection

@push('after-scripts')

<script>
    $("#btn-checkout").click(function(e){
        $("#checkout-loading").show();
    });
    $(".btn-update").click(function (e) {
        e.preventDefault();

        var ele = $(this);
        var url = "{{ route('frontend.production.product.cart.update') }}";
        var q = ele.parents("tr").find(".quantity").val(); 
        $.ajax({
            url: url,
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: q},
            success: function (response) {
                window.location.reload();
            },
            error:function(response){
                console.log(response);
            }
        });
    });

    $(".btn-remove").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure")) {
            var url = "";
            if(ele.data("type") == "reservations")
                url = '{{ route("frontend.record.service.cart.remove") }}';
            else if(ele.data("type") == "products")
                url = '{{ route("frontend.production.product.cart.remove") }}';
            else{
                alert("There's something wrong, please reload the page");
                window.location.reload();
            }
            console.log(url);
            $.ajax({
                url: url,
                method: "DELETE",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                success: function (response) {
                    window.location.reload();
                },
                error: function (response){
                    console.log(response);
                }
            });
        }
    });
</script>

@endpush