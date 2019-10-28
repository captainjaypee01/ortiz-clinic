@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
 
{{--             
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
                            <img src="{{ $service->image_location ? $service->format_image_location : asset('img/frontend/ortiz-clinic-logo.png') }}"   class="d-block w-100" height="100%" alt="...">
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
    </div>
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
    <hr> --}}

    @if(count($carouselProducts) > 0) 
            <div class="bd-example">
                <div id="carouselProducts" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        
                        @foreach($carouselProducts as $product)
                        <li data-target="#carouselProducts" data-slide-to="{{ ( $loop->iteration - 1) }}" class="{{ ($loop->iteration - 1) == 0 ? 'active' : ''}}"></li>
                        @endforeach  
                    </ol>
                    <div class="carousel-inner text-secondary">
                        @foreach($carouselProducts as $product)
                        <div class="carousel-item {{ ($loop->iteration - 1) == 0 ? 'active' : ''}}">
                            <img src="{{ $product->image_location ? $product->format_image_location : asset('img/frontend/ortiz-clinic-logo.png') }}"   class="d-block w-100" style="height:500px;" alt="...">
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
    @else
    <div class="row">
        <div class="col text-center">
            <p>There are no products available right now.</p>
        </div>
    </div>
    @endif
  
    <div class="container">

        <div class="row mt-4">
            <div class="col text-center">
                <h3 class="text-title">Our Products</h3>
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
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
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
            
        </div><!-- /.row -->

        

    </div>

    <div class="jumbotron">
        <div class="container">
            <div class="row mt-4">
                <div class="col text-center">
                    <h3 class="text-title">Our Services</h3>
                </div>
            </div>
            <div class="row mt-4">
                
                @if(count($services) > 0)
                    @foreach($services as $service)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                @if($service->image_location)
                                <img src="{{ $service->format_image_location }}" style="max-height: 225px;" alt="..." class="img-thumbnail w-100"> 
                                @else<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">No Photo Available</text></svg>
                                @endif
                                
                                <div class="card-body">
                                    <h3 class="text-title">{{ $service->name }} </h3>
                                    <details>
                                        <summary>Description</summary>
                                        <p class="card-text text-wrap">{{ $service->description }}</p>
                                    </details>
                                    <strong>{{ $service->format_price }}</strong>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('frontend.record.branch.index') }}" class="btn btn-sm btn-outline-secondary">Go To Branches</a> 
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
                
            </div><!-- /.row -->.
        </div>
    </div>
@endsection
