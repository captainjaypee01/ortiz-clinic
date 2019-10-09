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
        return view('frontend.transaction.reservation.index')
                ->withReservations(auth()->user()->reservations );
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
