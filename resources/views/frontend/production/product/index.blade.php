@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Products' )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Products - {{ $products->total() . ' current available'}}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    @foreach($products as $product)
                    <div class="row mt-4">
                        <div class="col col-md-3">
                            <img src="{{ asset('img/frontend/ortiz-clinic-logo.png') }}" class="d-block w-100 h-50" alt="...">
                        </div>
                        <div class="col">
                            <div class="card p-4">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->price }}</p>
                                <p>{{ $product->description }}</p>
                                <a href="{{ route('frontend.production.product.show', $product) }}" class="btn btn-info btn-sm w-25">View Product</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            {!! $products->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
