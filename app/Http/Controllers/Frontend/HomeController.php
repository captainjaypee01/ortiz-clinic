<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Production\Product;
use App\Models\Record\Branch;
use App\Models\Record\Service;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // dd(session()->get('currentLocation'));
        return view('frontend.index')
            ->withServices(Service::where('status', 1)->orderBy("created_at", "desc")->paginate(9))
            ->withCarouselProducts(Product::where('status', 1)->orderBy("created_at", "desc")->paginate(3))
            ->withProducts(Product::where('status', 1)->orderBy("created_at", "desc")->paginate(9));
    }

    public function setLocation(){
        $currentLocation = array(
            'lat' => request('lat'),
            'lng' => request('lng'),
        );
        session()->put('currentLocation', $currentLocation);
    }
    public function nearest(){
        $branches = Branch::where('status', 1)->get();
        $currentLocation = session()->get('currentLocation');
        $testArray = array(
            '123' => "wah",
            "99" => "wahs",
            "102" => "ewq",
        ); 
        foreach($branches as $branch){
            $distance = $this->getDistance($currentLocation, $branch);
            $distances[$branch->id] = array('distance' => $distance, 'branch' => $branch); //array('branch' => $branch, 'distance' => $distance);
        }
        
        sort($distances);
        // dd($distances);
        return view('frontend.record.branch.nearest', ['branches' => $distances]);
         
    }

    public function getDistance($currentLocation, $toLocation){
        // Get latitude and longitude from the geodata
        $latitudeFrom    = $currentLocation['lat'];
        $longitudeFrom    = $currentLocation['lng'];
        $latitudeTo        = $toLocation->lat;
        $longitudeTo    =  $toLocation->lng;
        
        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        // Convert unit and return distance
        $unit = strtoupper('M');
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return  round($miles * 1609.344);
            // return array('distance' => round($miles * 1609.344, 2).' meters', 'branch' => $toLocation);
        }else{
            return round($miles, 2).' miles';
        }
    }
}
