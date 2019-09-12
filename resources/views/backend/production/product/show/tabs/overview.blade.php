<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>

            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>

            <tr>
                <th>Unit</th>
                <td>{{ $product->unit }}</td>
            </tr>
            
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr> 

            <tr>
                <th>Last Updated At</th>
                <td>
                    @if($product->updated_at)
                        {{ timezone()->convertToLocal($product->updated_at) }}
                    @else
                        N/A
                    @endif
                </td>
            </tr>
 
        </table>
    </div>
</div><!--table-responsive-->
