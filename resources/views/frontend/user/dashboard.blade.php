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

    @if(count($products) > 0) 
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
            
            @if(count($services) > 0)
                @foreach($services as $service)
                <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                    @if($service->image_location)
                    <img src="{{ $service->format_image_location }}" style="max-height: 225px;" alt="..." class="img-thumbnail w-100"> 
                    @else
                        <svg class="bd-placeholder-img " width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">No Photo Available</text></svg>
                    @endif
                    <h2>{{ $service->name }}</h2>
                    <p>{{ $service->description }}</p>
                    <p><a class="btn btn-secondary" href="{{ route('frontend.record.branch.index') }}" role="button">Go to Branches &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                @endforeach
            @else
            <div class="col text-center">
                <p>There are no services available right now.</p>
            </div>
            @endif
            
        </div><!-- /.row -->
    </div>
@endsection
