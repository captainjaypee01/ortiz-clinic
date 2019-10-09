<?php

namespace App\Http\Controllers\Backend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Frontend\Transaction\ReservationMail;
use App\Models\Auth\User;
use App\Models\Record\Branch;
use App\Models\Record\Service;
use App\Models\Transaction\Reservation;
use Log;
use Mail;

class ReservationController extends Controller
{
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = Reservation::orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $reservations = $reservations->where("reference_number", "like", "%". $keyword . "%");
        }

        $reservations = $reservations->paginate(10)->setpath('');
        $reservations->appends($append); 
        return view('backend.transaction.reservation.index',
            [ 
                "search" => $keyword,
                "reservations" => $reservations,
            ]); 
    }

    public function create(){
        $customers = User::where("active", 1)->get();
        $services = Service::where('status', 1)->orderBy("name", "asc")->get(); 
        return view('backend.transaction.reservation.create',
            [
                'customers' => $customers,
                'services' => $services, 
            ]);
    }

    public function show(Reservation $reservation){ 
        return view('backend.transaction.reservation.show',
            [ 
                "reservation" => $reservation,  
            ])
            ->withService($reservation->service);
    }

    public function edit(Reservation $reservation){
        $customers = User::where("active", 1)->get();
        $services = Service::where('status', 1)->orderBy("name", "asc")->get(); 
        return view('backend.transaction.reservation.edit',
            [ 
                "reservation" => $reservation, 
                'services' => $services, 
                "reservation" => $reservation,
            ])
            ->withReservationService($reservation->service);
    }

    public function store(Request $request){
        $reservation = new Reservation();
        request()->validate([
            'customer' => 'required',   
        ]);
        $reservation->reference_number = $this->checkReference($this->generate_string(20));
        return $this->save($request, $reservation);
    }

    public function update(Request $request, Reservation $reservation){
        return $this->save($request, $reservation);
    }
    public function destroy(Reservation $reservation){
        $reservation->delete();
        return redirect()->route('admin.transaction.reservation.index')->withFlashSuccess("Reservation Successfully Deleted");
    }

    public function save($form, $reservation){
        request()->validate([ 
            'service' => 'required', 
            'branch' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',  
        ]);
 
        if(isset($form['customer']))
            $reservation->user_id = $form["customer"];

        $user = User::find($reservation->user_id); 
        $service = Service::find(request('service'));
        
        $reservation->total_amount = $service->price;
        $reservation->branch_id = request('branch');
        $reservation->service_id = $service->id;
        $reservation->reservation_date = request('reservation_date');
        $reservation->start_time = request('reservation_time'); 
        $reservation->user_id = $user->id; 
        $reservation->save();

        Log::info($reservation);
        
        Mail::to($user->email)->send(new ReservationMail($user, $service, $reservation));
        
        return redirect()->route('admin.transaction.reservation.index')->withFlashSuccess("Reservation Successfully Saved. Please check your email for your notification.<br>REFERENCE NUMBER : <strong>" . $reservation->reference_number. "</strong>");

    }

    public function mark(Reservation $reservation, $status){
        $reservation->status = $status;
        $reservation->save();
        return redirect()->route('admin.transaction.reservation.index')->withFlashSuccess("Reservation Status Saved");
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

    public function serviceBranches(){
        $service = Service::find(request('service'));
        
        $html = '';
        $success = false;
        $branches = null;
        if($service){
            $branches = $service->branches->all(); 
            if(count($branches) > 0 ){
                foreach($branches as $branch){
                    $html .= '<option value="' . $branch->id .'" data-name="'. $branch->name . '"> ' . $branch->name . '</option>';
                } 
                $success = true;
            } else $success = false;
        }
        return response()->json([
            "branches" => $branches,
            "html" => $html,
            "success" => $success,
        ]);
        
    }

}
