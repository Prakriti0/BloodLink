<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospitals.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form

        $hospital = new Hospital();
        $hospital->name = $request->name;
        $hospital->location = $request->location;
        $hospital->contact_no = $request->contact_no;
        // $hospital->save();

        // create  user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'hospital';
        $user->save();

        $hospital->user_id = $user->id;
        $hospital->save();

        return redirect()->back()->with('success', 'Hospital added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        $blood_groups = BloodGroup::pluck('name', 'id');

        return view('hospitals.edit', compact('hospital','blood_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Password is optional for updating
        ]);

        // Update hospital details
        $hospital->name = $request->name;
        $hospital->contact_no = $request->contact_no;
        $hospital->location = $request->location;
        $hospital->email = $request->email;

        // Update password if provided
        if ($request->password) {
            $hospital->password = Hash::make($request->password); // Hashing the password
        }

        // Save the changes to the database
        $hospital->save();

        // Redirect back with success message
        return redirect()->route('hospitals.index')->with('success', 'Hospital updated successfully!');
    
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the donor by ID
        $hospital = Hospital::findOrFail($id);
        
        // Delete the donor
        $hospital->delete();

        // Flash a success message to the session
       //  Session::flash('success', 'Donor deleted successfully.');

        // Redirect back to the donor list
        return redirect()->route('hospitals.index');
    }

}
