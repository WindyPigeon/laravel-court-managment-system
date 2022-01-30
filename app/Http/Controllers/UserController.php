<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{  
    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Display a listing of the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $User::all();

        return view('users.index')->with('users', $users);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:posts',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        $user->save();
        
        return view('court-details');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id = null)
    {
        return view('user.profile', [
            'user' => $id == null ? $id = Auth::user() : User::findOrFail($id),
        ]);
    }

    /**
     * Update the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    } 
}
