
@if(count($categoryProducts) > 0)
<div class="col">
    <div class="table-responsive">
        <table class="table table-hover"> 
            <thead>
                <tr>
                    <th>Name</th> 
                    <th>Price</th>
                </tr>
            </thead> 
            <tbody>
                @foreach($categoryProducts as $products)
                <tr>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->format_price }}</td>
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
            <p class="lead"><strong>There are no branches assigned to this service. Please asssign atleast 1 branch in this service</strong></p>
        </div>
    </div>
@endif



