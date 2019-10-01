@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.dashboard')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col">
                            <h3>Services</h3>
                        </div>
                    </div>
                    @if(count($services) > 0)
                    <div class="row mt-3">
                        <div class="col">
                            <div class="bd-example">
                                <div id="carouselServices" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        
                                        @foreach($services as $service)
                                        <li data-target="#carouselServices" data-slide-to="{{ ( $loop->iteration - 1) }}" class="{{ ($loop->iteration - 1) == 0 ? 'active' : ''}}"></li>
                                        @endforeach  
                                    </ol>
                                    <div class="carousel-inner text-secondary">
                                        @foreach($services as $service)
                                        <div class="carousel-item {{ ($loop->iteration - 1) == 0 ? 'active' : ''}}">
                                            <img src="{{ asset('img/frontend/ortiz-clinic-logo.png') }}"  height="250px" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block text-body">
                                                <h5 class="font-weight-bolder">{{ $service->name }}</h5>
                                                <p><span class="badge badge-info">{{ $service->price . ' | ' . $service->unit}}</span></p> 
                                            </div>
                                        </div>
                                        @endforeach 
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselServices" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselServices" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                    <div class="row mt-3 mb-4">
                        <div class="col text-center">
                            <a href="{{ route('frontend.record.service.index') }}" class="btn btn-info btn-sm">Browse all services</a>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col text-center">
                            <p>There are no services available right now.</p>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row mt-4">
                        <div class="col">
                            <h3>Products</h3>
                        </div>
                    </div>
                    @if(count($products) > 0)
                    <div class="row mt-3">
                        <div class="col">
                            <div class="bd-example">
                                <div id="carouselProducts" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        
                                        @foreach($products as $product)
                                        <li data-target="#carouselProducts" data-slide-to="{{ ( $loop->iteration - 1) }}" class="{{ ($loop->iteration - 1) == 0 ? 'active' : ''}}"></li>
                                        @endforeach  
                                    </ol>
                                    <div class="carousel-inner text-secondary">
                                        @foreach($products as $product)
                                        <div class="carousel-item {{ ($loop->iteration - 1) == 0 ? 'active' : ''}}">
                                            <img src="{{ asset('img/frontend/ortiz-clinic-logo.png') }}"  height="250px" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block text-body">
                                                <h5 class="font-weight-bolder">{{ $product->name }}</h5>
                                                <p><span class="badge badge-info">{{ $product->format_price  }}</span></p>
                                            </div>
                                        </div>
                                        @endforeach 
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselProducts" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselProducts" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                    @else
                    <div class="row">
                        <div class="col text-center">
                            <p>There are no products available right now.</p>
                        </div>
                    </div>
                    @endif

                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
</div>
@endsection
