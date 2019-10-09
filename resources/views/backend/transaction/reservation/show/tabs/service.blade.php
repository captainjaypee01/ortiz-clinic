

<div class="col">
    <div class="row">
        <div class="col table-responsive">
            <table class="table table-hover"> 
                <tr>
                    <th>Service Name</th>
                    <td>{{ $service->name }}</td>
                </tr>
    
                <tr>
                    <th>Service Price</th>
                    <td>{{ $service->format_price }}</td>
                </tr>
        
                <tr>
                    <th>Details</th>
                    <td>{{ $service->description }}</td>
                </tr>

            
            </table>
        </div>
    </div>
</div><!--table-responsive-->
