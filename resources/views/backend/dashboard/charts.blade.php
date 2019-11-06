
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Most Frequent Products availed
                </div>
                <div class="card-body">
                        {!! $totalFrequentProductChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                        Most Frequent Services availed
                </div>
                <div class="card-body">
                        {!! $totalFrequentServiceChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col">
            <div class="card">
                <div class="card-header">
                    Users
                </div>
                <div class="card-body">
                        {!! $userChart->container() !!}
                </div>
            </div>
        </div>
        
        <div class="col col-md-6 col">
            <div class="card">
                <div class="card-header">
                    Products
                </div>
                <div class="card-body">
                        {!! $productChart->container() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Total Monthly Sales
                </div>
                <div class="card-body">
                        {!! $totalOrderChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Orders Monthly Income
                </div>
                <div class="card-body">
                        {!! $orderChart->container() !!}
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Total Monthly Reservation per Services Sales
                </div>
                <div class="card-body">
                        {!! $totalReservationChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Reservation Monthly Income
                </div>
                <div class="card-body">
                        {!! $reservationChart->container() !!}
                </div>
            </div>
        </div>
    </div>
