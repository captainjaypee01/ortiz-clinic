<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover"> 
                        <tr>
                            <th>Reference</th>
                            <td>{{ $reservation->reference_number }}</td>
                        </tr>
        
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $reservation->user ? $reservation->user->full_name : 'N/A' }}</td> 
                        </tr>
                
                        <tr>
                            <th>Total Amount </th>
                            <td>{{ $reservation->format_amount }}</td>
                        </tr>
                        <tr>
                            <th>Total Services</th>
                            <td>{{ $reservation->total_services }}</td>
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
            </div>
        </div>
    </div><!--table-responsive-->
</div>

@include('backend.transaction.reservation.includes.modals.assign-employee-modal')
    
@push('after-scripts')

<script>
    $(".btn-assign").click(function(e){
        var elem = $(this);
        $("#service_id").val(elem.data("id"));
        $("#reservation_date").val(elem.data("date"));
        $("#reservation_time").val(elem.data("time"));
    });
</script>

@endpush
<div class="row"> 
    <div class="col"> 
        <div class="card">
            <div class="card-header">
                List of Services
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover"> 
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Duration</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation->services as $service)
                            <tr>
                            <td>{{ $service->name }} {{ $service->pivot->id }}</td>
                                <td>{{ $service->format_price }}</td>
                                <td>{{ $service->duration ? $service->duration .' minutes' : 'N/A' }}</td>
                                <td>{{ $service->pivot->reservation_date }}</td>
                                <td>{{ $service->pivot->reservation_time }}</td>
                                <td>
                                <button class="btn btn-info btn-sm btn-assign" data-toggle="modal" data-target="#assign-employee-modal" data-date="{{ $service->pivot->reservation_date }}" data-time="{{ $service->pivot->reservation_time }}" data-id="{{ $service->id }}">Assign</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!--table-responsive--> 

