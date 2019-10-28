
@if(count($symptomServices) > 0)
<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th>Name</th>  
                    <th>Price</th> 
                    <th>Duration</th>
                    <th>Available Branches</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($symptomServices as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->format_price }}</td>
                    <td>{{ $service->duration ? $service->duration .' minutes' : 'N/A' }}</td>
                    <td>
                        @if(count($service->branches) > 0)
                            @foreach($service->branches as $branch)
                            <p>{{ $branch->name }}</p>
                            @endforeach
                        @endif
                    </td>
                </tr>
                @endforeach   

            </tbody>
 
        </table>
    </div>
</div><!--table-responsive-->
@else
    <div class="row align-items-center justify-content-md-center">
        <div class="col-lg-3 col-xl-2 text-center">
            <img src="{{ asset('img/frontend/no_data.png') }}" height="200" class="mt-4">
        </div>
        <div class="col-lg-3 text-center">
            <h1 class="display-4">Oops..</h1>
            <p class="lead"><strong>There are no services assigned to this symptom. Please asssign atleast 1 service in this symptom</strong></p>
        </div>
    </div>
@endif



