<div class="col">
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
</div><!--table-responsive-->
    