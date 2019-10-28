
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Branches' )

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $branch->name }} </h1>
        <p class="lead text-muted">{{ $branch->sub_address }}</p>
        <p class="lead text-muted">{{  $branch->contact_number . ' | ' . $branch->tel_number }}</p>
          
    </div>
</section>

<div class="container">
    <div class="row mb-4">
        @if(count($services) > 0)
            @foreach($services as $service)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if($service->image_location)
                        <img src="{{ $service->format_image_location }}"  style="max-height: 225px;" alt="..." class="img-thumbnail w-100"> 
                        @else<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
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
                                    <a href="{{ route('frontend.record.branch.service.show', [$branch, $service]) }}" class="btn btn-sm btn-outline-secondary">View</a> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        
        <div class="col text-center">
                <p>There are no services available in this branch right now.</p>
        </div>
        @endif
    </div>
</div>

@endsection