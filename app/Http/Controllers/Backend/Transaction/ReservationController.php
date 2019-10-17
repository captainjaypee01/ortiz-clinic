<?php

namespace App\Http\Controllers\Backend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Backend\Transaction\ReservationPaymentMail;
use App\Mail\Frontend\Transaction\ReservationMail;
use App\Models\Auth\User;
use App\Models\Record\Room;
use App\Models\Record\Service;
use App\Models\Transaction\Reservation;
use Illuminate\Database\Eloquent\Collection;
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
        $users = User::role('employee')->get();
        foreach($reservation->services as $s)
            $branchIds[] = $s->pivot->branch_id;

            
        $rooms = Room::whereIn("branch_id", $branchIds)->where("status", 1)->get(); 

        return view('backend.transaction.reservation.show',
            [ 
                "reservation" => $reservation,  
                "users" => $users,
                "rooms" => $rooms,
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

    public function approve(Reservation $reservation){
        request()->validate([ 
            'employee' => 'required', 
            'room' => 'required',
        ]);

        $user = User::find($reservation->user_id);
        
        $reservation->payment_status = 1;
        $reservation->room_id = request('room');
        $reservation->employee_id = request('employee');
        $reservation->save(); 

        $service = Service::find($reservation->service_id);
        Mail::to($user->email)->send(new ReservationPaymentMail($user, $service, $reservation)); 

        return redirect()->route('admin.transaction.reservation.show', $reservation)->withFlashSuccess("Reservation Payment Status Saved and Email Successfully Sent");
    }

    public function reject(Reservation $reservation){
        $user = User::find($reservation->user_id);
        
        $reservation->payment_status = 2;
        $reservation->save(); 
         
        $service = Service::find($reservation->service_id);

        Mail::to($user->email)->send(new ReservationPaymentMail($user, $service, $reservation)); 

        return redirect()->route('admin.transaction.reservation.show', $reservation)->withFlashSuccess("Reservation Payment Status Rejected and Email Successfully Sent");
    }

    public function assignEmployee(Reservation $reservation){
        if(request()->service_id){ 
            $service = Service::find(request()->service_id);

            $user = User::find($reservation->user_id);
            $data = new Collection();
            $data->reservation_date = request('reservation_date');
            $data->reservation_time = request('reservation_time');
            $data->room_id = request('room_id');
            $checkReservation = 0;
            foreach($reservation->services as $service){
                if(($service->reservation_date == $data->reservation_date) && ($service->reservation_time == $data->reservation_time) && ($service->room_id == $data->room_id))
                    $checkReservation++;
            }
            if($checkReservation > 0)
                return redirect()->back()->withFlashWarning("Please assign in another room");

            foreach($reservation->services as $s){ 
                $reservation->services()->updateExistingPivot( $s, [ 
                    "branch_id" => $s->pivot->branch_id,
                    "reservation_date" => request('reservation_date'),
                    "reservation_time" => request('reservation_time'), 
                    "duration" => $service->duration, 
                    "room_id" => $service->id == $s->id ? request('room') : null,
                    "employee_id" => $service->id == $s->id ? request('employee') : null,
                ]); 
            }
            Mail::to($user->email)->send(new ReservationPaymentMail($user, $service, $reservation)); 
    
            return redirect()->back()->withFlashSuccess("Successfully Assigned and Email Successfully Sent");
        
        }
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
