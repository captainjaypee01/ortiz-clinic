@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Symptoms' )

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Symptoms</h1>
        <p class="lead text-muted">There are {{ $totalServices }} services available based on the symptoms you searched</p> 
            
    </div>
</section>
    
<div class="container">
     
    @if(count($symptoms) > 0)  
        <div class="row">   
            @if(count($symptoms) == 1)
                @foreach($symptoms as $symptom)  
                    <div class="col ">
                        <div class="card mb-4 shadow-sm">  
                            <div class="card-body">
                                <h3 class="text-title">{{ $symptom->name }} </h3>
                                <strong>Description:</strong>
                                <p>{{ $symptom->description }}</p>  
                                @if(count($symptom->services) > 0)
                                    
                                    <hr>
                                    <div class="row">
                                    @foreach($symptom->services as $service)
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">

                                                    <h3 class="text-title">{{ $service->name }} </h3>
                                                    <strong>Description:</strong>
                                                    <p>{{ $service->description }}</p>  
                                                    <ul class="list-group list-group-flush"> 
                                                        @if( count($service->branches) > 0) 
                                                            @foreach($service->branches as $branch)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $branch->name}}
                                                                <a href="{{ route('frontend.record.branch.service.show', [$branch, $service]) }}" class="btn btn-outline-secondary">View</a> 
                                                            </li>
                                                            @endforeach
                                                        @else
                                                            No available branch
                                                        @endif 
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    </div>
                                @endif
                                 

                            </div>
                        </div>
                    </div> 
                @endforeach
            @else
                @foreach($symptoms as $symptom)  
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">  
                            <div class="card-body">
                                <h3 class="text-title">{{ $symptom->name }} </h3>
                                <strong>Description:</strong>
                                <p>{{ $symptom->description }}</p>  
                                @if(count($symptom->services) > 0)
                                <ul class="list-group list-group-flush"> 
                                    @foreach($symptom->services as $service)
                                        <strong><a href="#collapseService-{{ $symptom->id }}-{{ $service->id }}" class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseService-{{ $symptom->id }}-{{ $service->id }}" role="button" aria-expanded="false" aria-controls="collapseService-{{ $symptom->id }}-{{ $service->id }}">{{ $service->name }}</a></strong>
                                        @if( count($service->branches) > 0) 
                                            @foreach($service->branches as $branch)
                                            <div class="collapse alert-warning" id="collapseService-{{ $symptom->id }}-{{ $service->id }}">
                                                
                                                <div class="card card-body"> 
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $branch->name}}
                                                        <a href="{{ route('frontend.record.branch.service.show', [$branch, $service]) }}" class="btn btn-outline-secondary">View</a> 
                                                    </li>
            
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            No available branch
                                        @endif 
                                    @endforeach
                                </ul>
                                @endif 

                            </div>
                        </div>
                    </div> 
                @endforeach
            @endif
        </div>
    
    <div class="row mt-4">
        <div class="col"> 
        </div>
    </div>
    @else
    
    <div class="row mt-4">
        <div class="col text-center">
                <p>There are no data regarding the symptoms.</p>
        </div>
    </div>
    @endif
</div>

@endsection
