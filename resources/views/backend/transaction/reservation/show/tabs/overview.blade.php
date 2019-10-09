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
                <th>Reservation Date </th>
                <td>{{ $reservation->format_reservation_date }}</td>
            </tr>

            <tr>
                <th>Reservation Time</th>
                <td>{{ $reservation->format_reservation_time }}</td>
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
    