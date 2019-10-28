@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Services' )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Services - {{ $services->total() . ' current available'}}
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    @foreach($services as $service)
                    <div class="row mt-4">
                        <div class="col col-md-3">
                            <img src="{{ $service->image_location ? $service->format_image_location : asset('img/frontend/ortiz-clinic-logo.png') }}" class="d-block w-100 h-50" alt="...">
                        </div>
                        <div class="col">
                            <div class="card p-4">
                                <h3>{{ $service->name }}</h3>
                                <p>{{ $service->price }}</p>
                                <p>{{ $service->description }}</p> 
                                @auth
                                <a href="{{ route('frontend.record.service.show', $service) }}" class="btn btn-info btn-sm w-25">View Service</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            {!! $services->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
