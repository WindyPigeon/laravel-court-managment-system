<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * The reservation repository instance.
     */
    protected $reservation;

    /**
     * Get a validator for an incoming reservation request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'facility_id' => ['required', 'exists:App\Models\Facility,id'],
            'reserved_courts' => ['required', 'integer', 'min:1'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
        ]);
    }

    /**
     * Display a listing of the reservation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index')->with('reservations', $reservations);
    }

    /**
     * Show the form for creating a new reservation.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create($facility_id)
    {
        return view('reservations.create', [
            'facility' => Facility::findOrFail($facility_id)
        ]);
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'facility_id' => $request->facility_id,
            'reserved_courts' => $request->reserved_courts,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ];

        $validated = ReservationController::validator($data);

        if ($validated) {
            $reservation = ReservationController::create($data);
            $reservation->save();
        }
    }

    /**
     * Display the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('reservations.details', [
            'reservation' => Reservation::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('reservations.edit')->with('reservation', Reservation::find($id));
    }

    /**
     * Update the specified reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified reservation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reservation::destroy($id);
    }
}
