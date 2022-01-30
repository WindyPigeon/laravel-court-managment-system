<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
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
     * Create a new reservation instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Reservation
     */
    protected function create(array $data)
    {
        return Reservation::create([
            'user_id' => $data['user_id'],
            'facility_id' => $data['facility_id'],
            'reserved_courts' => $data['reserved_courts'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }

    /**
     * Show the details for a given reservation.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('reservation.details', [
            'reservation' => Reservation::findOrFail($id)
        ]);
    }

    /**
     * Store a new reservation in the database.
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
}
