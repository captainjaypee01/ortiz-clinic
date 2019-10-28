@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Service' )

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $service->name }}</h1>
        <p class="lead text-muted">{{ $service->format_price }}</p> 
        <p class="lead text-muted">{{ $service->duration ? $service->duration .' minutes' : 'N/A' }}</p> 
        <p class="lead text-muted">{{ $service->description }}</p>  
        <br>
        @if($service->image_location)
        <img src="{{ $service->format_image_location }}" style="max-height: 300px;" alt="..." class="img-thumbnail"> 
        @else
        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>N/A</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">No Photo Available</text></svg>
        @endif
    </div>
</section>

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {{ html()->form('POST', route('frontend.record.branch.service.cart.add', [$branch,$service]))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label("Reservation Date")->for('reservation_date') }}
                                {{ html()->date('reservation_date')
                                        ->class('form-control calendar')  
                                        ->required() }}
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            {{ html()->label("Reservation Time")->for('reservation_time') }}
                            {{ html()->time('reservation_time')
                                    ->class('form-control')   
                                    ->required() }}
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col ">
                            <a href="{{ route('frontend.record.branch.index') }}" class="btn btn-info btn-sm">Go Back</a>
                        </div> 
                        <div class="col text-right">
                            <button type="submit" class="btn btn-success btn-sm " >
                                Submit
                            </button>
                        </div> 
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

@endpush
@push('after-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>
    Date.prototype.addDays = function(days) {
        this.setDate(this.getDate() + parseInt(days));
        return this;
    };
    var minimumDate = new Date(new Date().getDate() + 2);
    $('#reservation_date').datetimepicker( {
        minDate : new Date().addDays(1),
        format:'Y-M-DD'
    });

    $('#branch').selectpicker();
    $("#btn-show-reservation").click(function(e){
        $("#section-reservation").show();
        $("#section-show").hide();
    });

    $("#btn-show-service").click(function(e){
        $("#section-reservation").hide();
        $("#section-show").show();
    });
</script>
@endpush