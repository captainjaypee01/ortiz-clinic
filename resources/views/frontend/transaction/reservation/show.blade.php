@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'Reservations' )

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        Show Reservation
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover"> 
                                    <tr>
                                        <th>Reference</th>
                                        <td>{{ $reservation->reference_number }}</td>
                                    </tr>
                        
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>{{ $reservation->user->full_name }}</td>
                                    </tr>
                          
                                    <tr>
                                        <th>Last Updated At</th>
                                        <td>
                                            @if($reservation->updated_at)
                                                {{ timezone()->convertToLocal($reservation->updated_at) }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                            
                                </table>
                            </div>
                        </div><!--table-responsive-->
                    </div>
                    <hr>
                    <h3 class="text-title">Service Details</h3>
                    
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-hover"> 
                                    <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reservation->services as $service)
                                        <tr>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->format_price }}</td>
                                            <td>{{ $service->duration ? $service->duration .' minutes' : 'N/A' }}</td>
                                            <td>{{ $service->pivot->reservation_date }}</td>
                                            <td>{{ $service->pivot->reservation_time }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>  
                                </table>
                            </div>
                        </div><!--table-responsive-->\
                    </div>
                    
                    <hr> 
                        
                        
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('frontend.transaction.reservation.index')}}" class="btn btn-info btn-sm">Go Back</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.transaction.reservation.includes.modals.upload-payment-modal')

@endsection