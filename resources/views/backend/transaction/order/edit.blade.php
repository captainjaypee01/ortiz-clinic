@extends('backend.layouts.app')

@section('title', 'Order Management' . ' | ' . 'Edit Order')

@section('content')
{{ html()->modelForm($order, 'PATCH', route('admin.transaction.order.update', $order))->class('form-horizontal')->open() }} 
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Order Management
                        <small class="text-muted">Edit Order</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Reference Number")->for('customer') }}
                        {{ html()->text("reference_number")->class("form-control")->readonly() }}
                    </div>
                </div> 
            </div> 

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Customer")->for('customer') }}
                        {{ html()->text("customer_name")->class("form-control")->value($order->user->full_name)->readonly() }}
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Products")->for('products') }}
                        <select name="products[]" id="products" class="selectpicker form-control" multiple data-live-search="true">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name  . " | " . $product->format_price }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div> 
            </div>

            <div id="section-quantity" style="display:none;" class="row"> 
            </div>

            <div class="row" id="section-btn-compute" style="display:none;">
                <div class="col">
                    <button type="button" class="btn btn-info" id="btn-amount">Compute Total Amount</button>
                </div>
            </div>

            <div class="row" id="section-amount" style="display:none;">
                <div class="col">
                    <div class="form-group">
                        {{ html()->label("Total Orders")->for('total_orders') }}
                        {{ html()->text("total_orders")->class("form-control")->readonly() }} 
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{ html()->label("Total Amount")->for('total_amount') }}
                        {{ html()->text("total_amount")->class("form-control")->readonly() }} 
                    </div>
                </div>
            </div> 


        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.transaction.order.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit("Update") }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->form()->close() }}
@endsection

@push('after-styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@endpush
@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('#customers').selectpicker();
    $('#products').selectpicker();
    $("#products").change(function(e){
        console.log($("#products").val());
        var products = $("#products").val();
        var total_amount = 0;
        products.forEach(product => {
            console.log($("#products option[value='"+ product +"']").data("price"));
            var price = $("#products option[value='"+ product +"']").data("price");
            total_amount += price;
        });
        
        $("#section-btn-compute").show();
        $("#total_orders").val( products.length );
        $("#total_amount").val( formatNumber(total_amount) ); 
    });

    $("#btn-amount").click(function(e){
        var total_amount = $("input[name='quantity[]']").map(function(){return ($(this).val() * $(this).data('price')) ;}).get().reduce((a, b) => a + b, 0);
        
        $("#section-amount").show();
        $("#total_amount").val( formatNumber(total_amount) ); 
        
    }); 
    
    function formatNumber(x) {
        const options = { 
            minimumFractionDigits: 2,
            maximumFractionDigits: 2 
        };
        return Number(x).toLocaleString('en', options);
    }
    
    var selectedProducts = []; 
    var initQuantityHtml = '';
    @foreach($orderProducts as $product)
    initQuantityHtml += '<div class="col col-md-6">' +
        '<div class="form-group">' +
            '<label>Quantity of {{ $product->name }}</label>' + 
            '<input type="number" class="form-control quantity-number" name="quantity[]" data-price="{{ $product->price }}" value="{{ $product->pivot->quantity }}">' +
        '</div>' +
    '</div>';
    selectedProducts.push({{ $product->id }}); 
    @endforeach 
    
    $("#section-quantity").html(initQuantityHtml).show();
    $("#section-btn-compute").show();
    
    $('#products').val(selectedProducts); 
    $('#products').selectpicker('refresh'); 
</script>
@endpush
