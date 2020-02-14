<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Production\Product;
use App\Models\Record\Branch;
use App\Models\Record\Service;
use Illuminate\Database\Eloquent\Collection;
use App\Charts\DashboardChart;
use App\Models\Transaction\Order;
use App\Models\Transaction\Reservation;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = new Collection();
        $products = new Collection();
        $services = new Collection();
        $branches = new Collection();

        $users->total = User::count();
        $products->total = Product::count();
        $services->total = Service::count();
        $branches->total = Branch::count(); 
 
        $this->totalFrequentServiceChart();
        return view('backend.dashboard',[
                    "userChart" => $this->userChart(),    
                    "productChart" => $this->productChart(),     
                    "orderChart" => $this->orderChart(),   
                    "totalOrderChart" => $this->totalOrderChart(),
                    "reservationChart" => $this->reservationChart(),   
                    "totalReservationChart" => $this->totalReservationChart(),
                    "totalFrequentProductChart" => $this->totalFrequentProductChart(),
                    "totalFrequentServiceChart" => $this->totalFrequentServiceChart(),
                    'transactionChart' => $this->monthlyTransactionChart(),
                ])
                ->withUsers($users)
                ->withProducts($products)
                ->withServices($services)
                ->withBranches($branches);
    }

    public function monthlyTransactionChart(){
        $month = request('month') ? request('month') : Carbon::now()->month;
        $year = request('year') ? request('year') : Carbon::now()->year;
        $transactionChart = new DashboardChart();
        $transactionOrders = Transaction::selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as entry_date, sum(total_products) as total')
                                            ->whereMonth('created_at', $month)
                                            ->whereYear('created_at', $year)->where('status', 1)
                                            ->whereExists(function ($query) { $query->from('orders')->where('orders.payment_status', 1)->whereRaw('transactions.id = orders.transaction_id');  })
                                            ->groupBy('entry_date')->get(); 
                                            
        $transactionReservations = Transaction::selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as entry_date, sum(total_services) as total')
                                            ->whereMonth('created_at', $month)
                                            ->whereYear('created_at', $year)->where('status', 1)
                                            ->whereExists(function ($query) { $query->from('reservations')->where('reservations.payment_status', 1)->whereRaw('transactions.id = reservations.transaction_id');  })
                                            ->groupBy('entry_date')->get(); 

        
        $transactions = Transaction::selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as entry_date, count(status) as total')->whereMonth('created_at', $month)->whereYear('created_at', $year)->groupBy('entry_date')->get();
        $monthYear = Carbon::createFromDate($year, $month, 1);
        $daysThisMonth = []; // set temp vars
        $orders_data = [];
        $reservations_data = [];
        $time = [];
        $currentDate = $monthYear->toDateString();
        
        for ($i = 1; $i <= $monthYear->daysInMonth; $i++) {
            array_push($orders_data, ($offset = $transactionOrders->firstWhere('entry_date', $currentDate)) ? $offset->total : null);
            array_push($reservations_data, ($offset = $transactionReservations->firstWhere('entry_date', $currentDate)) ? $offset->total : null);
            array_push($time, ($offset = $transactions->firstWhere('entry_date', $currentDate)) ? $offset->total : null);
            array_push($daysThisMonth, $currentDate);
            $currentDate = $i < $monthYear->daysInMonth ? $monthYear->addDay()->toDateString() : $monthYear->toDateString();
        };
        
        $transactionChart->labels($daysThisMonth);
        $transactionChart->dataset('Orders', 'bar', $orders_data)->color('#63C2DE')->backgroundColor('#63C2DE');
        $transactionChart->dataset('Reservations', 'bar', $reservations_data)->color('#CD201F')->backgroundColor('#CD201F');

        return $transactionChart;

    }

    public function userChart(){
        $data = User::select(DB::raw("COUNT(*) as count ,  MONTHNAME(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->month);
            array_push($dataset, $d->count);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Total Created Users per month', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }
    
    public function productChart(){
        $data = Product::select(DB::raw("COUNT(*) as count ,  MONTHNAME(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->month);
            array_push($dataset, $d->count);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Total Created Products per month', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }

    public function orderChart(){
        $data = Order::select(DB::raw("SUM(total_amount) as total ,  MONTHNAME(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->month);
            array_push($dataset, $d->total);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Monthly Income', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }

    public function totalOrderChart(){
        $data = Order::select(DB::raw("SUM(total_orders) as total ,  MONTHNAME(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->month);
            array_push($dataset, $d->total);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Monthly Order Sales', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }

    public function reservationChart(){
        $data = Reservation::select(DB::raw("SUM(total_amount) as total ,  MONTHNAME(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->month);
            array_push($dataset, $d->total);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Monthly Income', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }

    public function totalReservationChart(){
        $data = Reservation::select(DB::raw("SUM(total_services) as total ,  MONTHNAME(created_at) as month"))
        ->orderBy("created_at")
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->month);
            array_push($dataset, $d->total);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Total Services Reserved per month sales', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }

    public function totalFrequentProductChart(){ 
        $data = Product::with('orders')->withCount('orders')->orderBy('orders_count', 'desc')->limit(5)->get(); 
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->name);
            array_push($dataset, $d->orders_count);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Most Frequent Product Availed', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
        dd($data);
    }

    public function totalFrequentServiceChart(){ 
        $data = Service::with('reservations')->withCount('reservations')->orderBy('reservations_count', 'desc')->limit(5)->get(); 
        $arrayColors = array("rgba(75, 192, 192, 0.5)", 
                            "rgba(54, 162, 235, 0.5)",
                            "rgba(201, 203, 207, 0.5)",
                            "rgba(255, 159, 64, 0.5)",
                            "rgba(255, 205, 86, 0.5)",
                            "rgba(255, 99, 132, 0.5)",
                            "rgba(153, 102, 255, 0.5)",);
        $labels = array();
        $dataset = array();
        $colors = array();
        foreach($data as $d){
            array_push($labels, $d->name);
            array_push($dataset, $d->reservations_count);
            array_push($colors, $arrayColors[rand(0,5)]);
        }
        $chart = new DashboardChart;
        $chart->labels($labels);    
        $chart->dataset('Most Frequent Service Availed', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
        dd($data);
    }
}
