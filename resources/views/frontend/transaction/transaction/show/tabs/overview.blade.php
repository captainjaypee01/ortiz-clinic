<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Reference</th>
                <td>{{ $transaction->reference_number }}</td>
            </tr>

            <tr>
                <th>Customer Name</th>
                <td>{{ $transaction->user ? $transaction->user->full_name : 'N/A' }}</td> 
            </tr>
    
            <tr>
                <th>Total Amount </th>
                <td>{{ $transaction->format_amount }}</td>
            </tr>
            <tr>
                <th>Total Services</th>
                <td>{{ $transaction->total_services > 0 ? $transaction->total_services : 0 }}</td>
            </tr>
            <tr>
                <th>Total Products</th>
                <td>{{ $transaction->total_products > 0 ? $transaction->total_products : 0  }}</td>
            </tr>
    
            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($transaction->updated_at)
                        {{ timezone()->convertToLocal($transaction->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
    
        </table>
    </div>
</div><!--table-responsive-->
    