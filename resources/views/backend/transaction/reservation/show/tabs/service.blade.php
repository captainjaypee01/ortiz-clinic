

<div class="col">
    <div class="row">
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
</div><!--table-responsive-->

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