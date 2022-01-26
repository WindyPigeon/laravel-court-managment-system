<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
    /**
     * The facility repository instance.
     */
    protected $facilities;

    public function index()
    {
        $facilities = Facilities::all();
    }

    public function create()
    {
    }

    /**
     * Store a new facility.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    /**
     * Update the given facility.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        Facility::destroy($id);
    }
}
