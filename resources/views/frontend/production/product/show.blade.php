@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Products' )

@section('content')

@include('frontend.production.product.includes.modals.confirm-modal')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $product->name }}</h1>
        <p class="lead text-muted">{{ $product->format_price }}</p> 
        <p class="lead text-muted">{{ $product->description }}</p> 
        <button type="button" class="btn btn-secondary btn-sm mb-4" data-toggle="modal" data-target="#order-product-modal">
            Order Product
        </button>
        <br>
        @if($product->image_location)
        <img src="{{ $product->format_image_location }}" style="max-height: 300px;" alt="..." class="img-thumbnail"> 
        @else
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">No Photo Available</text></svg>
        @endif
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3 class="text-title">Other Products</h3>
        </div>
    </div>
    <div class="row mt-4">
        @if(count($products) > 0)
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if($product->image_location)
                        <img src="{{ $product->format_image_location }}" style="max-height: 225px;" alt="..." class="img-thumbnail w-100"> 
                        @else<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">No Photo Available</text></svg>
                        @endif
                        
                        <div class="card-body">
                            <h3 class="text-title">{{ $product->name }} </h3>
                            <details>
                                <summary>Description</summary>
                                <p class="card-text text-wrap">{{ $product->description }}</p>
                            </details>
                            <strong>{{ $product->format_price }}</strong>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('frontend.production.product.show', $product) }}" class="btn btn-sm btn-outline-secondary">View</a> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        
        <div class="col text-center">
                <p>There are no products available right now.</p>
        </div>
        @endif
    </div>
    
    <div class="row mt-4 mb-4">
        <div class="col">
            <a href="{{route('frontend.production.product.index')}}" class="btn btn-info btn-sm">Go Back</a>
        </div>
        <div class="col text-right">
            {!! $products->render() !!}
        </div>
    </div>
</div>
     
@endsection

@push('after-scripts')

@endpush