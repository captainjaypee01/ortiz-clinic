<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Name</th>
                <td>{{ $service->name }}</td>
            </tr>

            <tr>
                <th>Price</th>
                <td>{{ $service->price }}</td>
            </tr>

            <tr>
                <th>Unit</th>
                <td>{{ $service->unit }}</td>
            </tr>
            
            <tr>
                <th>Description</th>
                <td>{{ $service->description }}</td>
            </tr> 

            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($service->updated_at)
                        {{ timezone()->convertToLocal($service->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
 
        </table>
    </div>
</div><!--table-responsive-->
