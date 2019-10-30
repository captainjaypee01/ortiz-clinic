<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Reference</th>
                <td>{{ $order->reference_number }}</td>
            </tr>

            <tr>
                <th>Customer Name</th>
                <td>{{ $order->user ? $order->user->full_name : 'N/A' }}</td> 
            </tr>

            <tr>
                <th>Total Orders</th>
                <td>{{ $order->total_orders }}</td>
            </tr>
            
            <tr>
                <th>Total Amount</th>
                <td>{{ $order->format_amount }}</td>
            </tr> 

            <tr>
                <th>Payment Status</th>
                <td>{!! $order->status_payment !!}</td>
            </tr> 
            
            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($order->updated_at)
                        {{ timezone()->convertToLocal($order->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
    
        </table>
    </div>
</div><!--table-responsive-->
    