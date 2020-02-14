    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Monthly Transactions
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col col-sm-12 col-md-5">
                                <div class="form-group">
                                    <select name="year" id="year" class="form-control">
                                        <option value>Select Year</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-sm-12 col-md-5">
                                <div class="form-group">
                                    <select name="month" id="month" class="form-control">
                                        <option value>Select Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-sm form-control ">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col">                  
                            {!! $transactionChart->container() !!}  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
