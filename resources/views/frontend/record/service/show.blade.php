@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Service' )

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Show Service
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    
                    <div class="row mt-4" id="section-show">
                        <div class="col col-md-3">
                            <img src="{{ asset('img/frontend/ortiz-clinic-logo.png') }}" class="d-block w-100 h-50" alt="...">
                        </div>
                        <div class="col">
                            <div class="card p-4">
                                <h3>{{ $service->name }}</h3>
                                <p>{{ $service->format_price }}</p>
                                <p>{{ $service->description }}</p>
                                <button type="button" class="btn btn-secondary btn-sm" id="btn-show-reservation">
                                    Go To Reservation
                                </button>
                            </div>
                        </div>
                    </div> 
                    {{ html()->form('POST', route('frontend.record.service.reserve', $service))->attribute("enctype","multipart/form-data")->class('form-horizontal')->open() }}
                    <div class="row mt-4" id="section-reservation" style="display:none;">
                        

                        <div class="col col-md-3">
                            <img src="{{ asset('img/frontend/ortiz-clinic-logo.png') }}" class="d-block w-100 h-50" alt="...">
                        </div>
                        <div class="col">
                            <div class="card p-4">
                                
                                <div class="row">
                                    <div class="col ">
                                        <div class="form-group">
                                            {{ html()->label("Branches")->for('branch') }}
                                            <select name="branch" id="branch" class="selectpicker form-control"  data-live-search="true">
                                                @foreach($branches as $branch)
                                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div> 
                                </div>
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
                                    <div class="col col-md-6">
                                        <button type="button" class="btn btn-warning btn-sm "  id="btn-show-service">
                                            Show Service
                                        </button>
                                    </div>
                                    <div class="col col-md-6 text-right">
                                        <button type="submit" class="btn btn-success btn-sm " >
                                            Reserve Service
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    {{ html()->form()->close() }}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('frontend.record.service.index')}}" class="btn btn-info btn-sm">Go Back</a>
                        </div>
                    </div>
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