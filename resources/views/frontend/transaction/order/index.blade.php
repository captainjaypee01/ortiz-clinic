@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Orders' )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    List of orders
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">
                                Orders : <small class="text-muted"> {{ count($orders) }} Total Orders</small>
                            </h4>
                        </div><!--col-->
            
                        <div class="col-sm-7"> 
                        </div><!--col-->
                    </div><!--row-->
            
                    <div class="row">
                        <div class="col-sm-5">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search"  name="search"  aria-label="Search">
                                    
                                <button class="btn btn-outline-success my-2 my-sm-0 mr-2"  type="submit">Search</button>
                                <button class="btn btn-outline-info my-2 my-sm-0" type="">Clear</button>
                            </form>
                        </div><!--col-->
            
                    </div><!--row-->
                    
                    @if(count($orders) > 0)
                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table id="order-table" class="table">
                                    <thead>
                                    <tr> 
                                        <th>Reference Number</th>
                                        <th>Customer Name</th>
                                        <th>Total Orders</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $index => $order) 
                                        <tr> 
                                            <td>{{ $order->reference_number }}</td>
                                            <td>{{ $order->user->full_name }}</td>
                                            <td>{{ $order->total_orders }}</td>
                                            <td>{{ $order->format_amount }}</td>
                                            <td>{!! $order->status_payment !!}</td>
                                            <td>{!! $order->status_label !!}</td>
                                            <td>{!! $order->created_at !!}</td>
                                            <td>
                                                <a href="{{route('frontend.transaction.order.show', $order) }}" data-toggle="tooltip" data-placement="top" title="{{__('buttons.general.crud.view')}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                    <div class="row">
                        <div class="col-7">
                            <div class="float-left">
                                {!! count($orders) !!} {{ "Orders Total" }}
                            </div>
                        </div><!--col-->
            
                        <div class="col-5">
                            <div class="float-right"> 
                                {!! count($orders) !!}
                            </div>
                        </div><!--col-->
                    </div><!--row-->
            
                    
                    @else
                        <div class="row align-items-center justify-content-md-center">
                            <div class="col-lg-3 col-xl-2 text-center">
                                <img src="{{ asset('img/frontend/no_data.png') }}" height="200" class="mt-4">
                            </div>
                            <div class="col-lg-3 text-center">
                                <h1 class="display-4">Oops..</h1>
                                <p class="lead"><strong>No data in here. Try to modify filters to search records.</strong></p>
                            </div>
                        </div>
                    @endif
            
                </div><!--card-body-->
            </div><!--card-->
        </div>
    </div>
</div>
@endsection
