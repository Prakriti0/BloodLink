<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\BloodGroup;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DonorController extends Controller implements HasMiddleware
{

    public static  function middleware()
    {
        return [
            new Middleware('auth', only: ['index']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blood_groups = BloodGroup::all(); // Get all blood groups for the dropdown

        // If a blood group is selected, filter the donors by that blood group
        if ($request->has('blood_group') && $request->blood_group != '') {
            $donors = Donor::where('blood_group_id', $request->blood_group)->get();
        } else {
            $donors = Donor::all(); // Otherwise, get all donors
        }

        return view('donors.index', compact('donors', 'blood_groups'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blood_groups = BloodGroup::pluck('name', 'id');
        return view('donors.create', compact('blood_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form

        // submit form
        $donor = new Donor();
        $donor->name = $request->name;
        $donor->address = $request->address;
        $donor->phone_no = $request->phone;
        $donor->gender = $request->gender;
        $donor->blood_group_id = $request->blood_group;
        $donor->save();

        return redirect()->back()->with('success', 'You have successfully registered as Donor.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donor $donor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donor $donor)
    {
        $blood_groups = BloodGroup::pluck('name', 'id');

        return view('donors.edit', compact('donor', 'blood_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donor $donor)
    {
        // Step 2: Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female,others',
            'blood_group' => 'required|exists:blood_groups,id', // assuming blood_groups table exists
        ]);

        // Step 3: Update the donor with validated data
        $donor->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone_no' => $request->input('phone'),
            'gender' => $request->input('gender'),
            'blood_group_id' => $request->input('blood_group'),
        ]);

        // Step 4: Redirect or return success message
        return redirect()->route('donors.index')->with('success', 'Donor information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    
     public function destroy($id)
     {
         // Find the donor by ID
         $donor = Donor::findOrFail($id);
         
         // Delete the donor
         $donor->delete();
 
         // Flash a success message to the session
        //  Session::flash('success', 'Donor deleted successfully.');
 
         // Redirect back to the donor list
         return redirect()->route('donors.index');
     }
}
