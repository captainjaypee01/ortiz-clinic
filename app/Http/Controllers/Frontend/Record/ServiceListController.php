<?php

namespace App\Http\Controllers\Frontend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Frontend\Transaction\ReservationMail;
use App\Models\Record\Branch;
use App\Models\Record\Service;
use App\Models\Transaction\Reservation;
use Log;
use Mail;

class ServiceListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.record.service.index')
                ->withServices(Service::where("status", 1)->orderBy("name", "asc")->paginate(5));
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function show(Service $service)
    {
        $branches = Branch::where('status', 1)->get();
        return view('frontend.record.service.show')
                ->withService($service)
                ->withBranches($branches);
    }

    public function reserve(Service $service){
        
        $reservation = new Reservation(); 
        $reservation->reference_number = $this->checkReference($this->generate_string(20));
        return $this->save($service, $reservation);
    }

    public function save($service, $reservation){
        request()->validate([
            'branch' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required', 
        ]); 
        
        $reservation->total_amount = $service->price;
        $reservation->branch_id = request('branch');
        $reservation->service_id = $service->id;
        $reservation->reservation_date = request('reservation_date');
        $reservation->start_time = request('reservation_time'); 
        $reservation->user_id = auth()->user()->id; 
        $reservation->save();
        
        $user = auth()->user();

        Mail::to($user->email)->send(new ReservationMail($user, $service, $reservation));
        
        return redirect()->route('frontend.transaction.reservation.index')->withFlashSuccess("Reservation Successfully Saved. Please check your email for your notification.<br>REFERENCE NUMBER : <strong>" . $reservation->reference_number. "</strong>");
    }

    function generate_string($strength = 20) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return strtoupper($random_string);
    }

    public function checkReference($hash){ 

        while( count(Reservation::where("reference_number", $hash)->get()) > 0){
            $newHash = $this->generate_string(40);
            $count = Upload::where("reference_number", $newHash)->count();
            if($count > 0)
                continue;
            else{
                return $newHash;
                break;
            }
        }

        return $hash;

    }

}
