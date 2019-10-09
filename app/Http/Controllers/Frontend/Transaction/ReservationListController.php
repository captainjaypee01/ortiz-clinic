<?php

namespace App\Http\Controllers\Frontend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction\Reservation;

class ReservationListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = auth()->user()->reservations()->orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $reservations = $reservations->where("reference_number", "like", "%". $keyword . "%");
        }

        $reservations = $reservations->paginate(10)->setpath('');
        $reservations->appends($append); 
        return view('frontend.transaction.reservation.index')
                ->withReservations($reservations );
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function show(Reservation $reservation)
    {
        return view('frontend.transaction.reservation.show')
                ->withReservation($reservation)
                ->withService($reservation->service);
    }
}
