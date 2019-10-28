<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Name</th>
                <td>{{ $branch->name }}</td>
            </tr>

            <tr>
                <th>Contact Number</th>
                <td>{{ $branch->contact_number }}</td>
            </tr>

            <tr>
                <th>Tel. Number</th>
                <td>{{ $branch->tel_number }}</td>
            </tr>

            <tr>
                <th>Address</th>
                <td>{{ $branch->sub_address }}</td>
            </tr>

            <tr>
                <th>Province and Country</th>
                <td>{{ $branch->province . ' | ' . $branch->country }}</td>
            </tr>

            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($branch->updated_at)
                        {{ timezone()->convertToLocal($branch->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
 
        </table>
    </div>
</div><!--table-responsive-->
