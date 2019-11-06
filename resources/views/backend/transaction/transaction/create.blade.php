@extends('backend.layouts.app')

@section('title', 'Transaction Management' . ' | ' . 'Create Transaction')

@section('content')
{{ html()->form('POST', route('admin.transaction.transaction.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                    Transaction Management
                        <small class="text-muted">Create Transaction</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>
            

            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Customer")->for('users') }}
                        <select name="user" id="users" class="selectpicker form-control" data-live-search="true">
                            @foreach($users as $user)
                                @if($user->hasRole("user"))
                                <option value="{{ $user->id }}" >{{ $user->full_name  . " | " . $user->email }}</option>
                                @endif
                            @endforeach
                            
                        </select>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col">
                    {{ html()->label("Date Created")->for('created_at') }}
                    {{ html()->date('created_at')
                            ->class('form-control calendar')  
                            ->required() }}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <h3>Reservation</h3>
                </div>
            </div>  
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Branch")->for('branches') }}
                        <select name="branch" id="branches" class="selectpicker form-control" data-live-search="true">
                            @foreach($branches as $branch) 
                                <option value="{{ $branch->id }}" >{{ $branch->name }}</option> 
                            @endforeach
                            
                        </select>
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Service")->for('services') }}
                        <select name="service" id="services" class="selectpicker form-control" data-live-search="true">
                            @foreach($services as $service) 
                                <option value="{{ $service->id }}" >{{ $service->name }}</option> 
                            @endforeach 
                        </select>
                    </div>
                </div>  
            </div>
            <div class="row"> 
                <div class="col form-group">
                    {{ html()->label("Reservation Date")->for('reservation_date') }}
                    {{ html()->date('reservation_date')
                            ->class('form-control calendar')  
                            ->required() }}
                </div>  
                <div class="form-group col">
                    {{ html()->label("Reservation Time")->for('reservation_time') }}
                    {{ html()->time('reservation_time')
                            ->class('form-control')   
                            ->required() }}
                </div> 
            </div>  
            <hr>
            <div class="row">
                <div class="col">
                    <h3>Orders</h3>
                </div>
            </div> 
            
            <div class="row">
                <div class="col col-sm-12">
                    <div class="form-group">
                        {{ html()->label("Product")->for('products') }}
                        <select name="product" id="products" class="selectpicker form-control" data-live-search="true">
                            @foreach($products as $product) 
                                <option value="{{ $product->id }}" >{{ $product->name }}</option> 
                            @endforeach 
                        </select>
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col">
                    {{ html()->label("Quantity")->for('quantity') }}
                    <input type="number" class="form-control" name="quantity" id="quantity">
                </div>
            </div>
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.transaction.transaction.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create'))->id("btn-submit") }}
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
    
    var total_amount = 0;
    $('#users').selectpicker();
    $('#branches').selectpicker();
    $('#services').selectpicker();
    $('#products').selectpicker(); 
</script>
@endpush
