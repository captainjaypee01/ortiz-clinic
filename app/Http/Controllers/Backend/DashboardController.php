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
 
        return view('backend.dashboard',[
                    "userChart" => $this->userChart(),    
                    "productChart" => $this->productChart(),     
                    "orderChart" => $this->orderChart(),   
                    "totalOrderChart" => $this->totalOrderChart(),
                    "reservationChart" => $this->reservationChart(),   
                    "totalReservationChart" => $this->totalReservationChart(),
                ])
                ->withUsers($users)
                ->withProducts($products)
                ->withServices($services)
                ->withBranches($branches);
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
        $chart->dataset('Monthly Orders', 'bar', $dataset)->backgroundColor($colors);
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
        $chart->dataset('Total Services Reserved per month', 'bar', $dataset)->backgroundColor($colors);
        return $chart;
    }

}
