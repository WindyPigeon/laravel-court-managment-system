<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
    }

    /**
     * Store a new flight in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = new Reservation;

        $reservation->start_time = request->start_time
        $reservation->end_time = request->end_time

        $reservation->save();
    }

    public function reserve()
    {
        $this->dispatch(
            new Reservation(\Auth::user(), $start_date, $end_date, $facility_id, $courts)
        );
    }
}
