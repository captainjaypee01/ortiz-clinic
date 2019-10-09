@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Products' )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Show Product
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover"> 
                                    <tr>
                                        <th>Reference</th>
                                        <td>{{ $order->reference_number }}</td>
                                    </tr>
                        
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>{{ $order->user->full_name }}</td>
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
                                        <th>Date Ordered</th>
                                        <td>{{ $order->format_order_date }}</td>
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
                        </div><!--table-responsive-->\
                    </div>
                    <hr>
                    <h3 class="text-title">List of Products</h3>
                    <div class="row">
                            <div class="col">
                            @if(count($order->products) > 0)
                                            
                                <div class="table-responsive">
                                    <table class="table table-hover"> 
                                        <tr>
                                            <th>Product Name</th>    
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                        <tbody>
                                            @foreach($order->products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->format_price }}</td>
                                                <td>{{ $product->pivot->quantity }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                No Products Ordered
                            @endif
                        </div>
                    </div>
                        
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('frontend.transaction.order.index')}}" class="btn btn-info btn-sm">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection