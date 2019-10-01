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
                    
                    <div class="row mt-4">
                        <div class="col col-md-3">
                            <img src="{{ asset('img/frontend/ortiz-clinic-logo.png') }}" class="d-block w-100 h-50" alt="...">
                        </div>
                        <div class="col">
                            <div class="card p-4">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->format_price }}</p>
                                <p>{{ $product->description }}</p>
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#order-product-modal">
                                    Order Product
                                </button>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('frontend.production.product.index')}}" class="btn btn-info btn-sm">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.production.product.includes.modals.confirm-modal')
@endsection

@push('after-scripts')

@endpush