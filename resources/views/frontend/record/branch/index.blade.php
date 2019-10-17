@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Branches' )

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Branches</h1>
        <p class="lead text-muted">There are {{ count($branches) }} products available</p> 
            
    </div>
</section>
    
<div class="container">
     
    <div class="row mt-4">
        @if(count($branches) > 0)
            @foreach($branches as $branch)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm"> 
                        
                        <div class="card-body">
                            <h3 class="text-title">{{ $branch->name }} </h3>
                            <p>{{ $branch->sub_address }}</p>
                            <p>{{ $branch->contact_number . ' | ' . $branch->tel_number }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-info btn-sm w-25" href="{{ route('frontend.record.branch.show', $branch) }}">View Services</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        
        <div class="col text-center">
                <p>There are no branches available right now.</p>
        </div>
        @endif
    </div>
    
    <div class="row mt-4">
            <div class="col">
            {!! $branches->render() !!}
        </div>
    </div>
</div>

@endsection
