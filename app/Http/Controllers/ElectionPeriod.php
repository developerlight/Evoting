<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Period;

class ElectionPeriod extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = Period::all();
        // dd($periods);
        return view('period/index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('period/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'end_date.after' => 'The end date must be a date after the start date.',
        ]);


        $period = new Period();
        $period->name = $request->input('name');
        $period->start_date = $request->input('start_date');
        $period->end_date = $request->input('end_date');
        $period->save();
        session()->flash('success', 'Period created successfully!');
        return redirect()->route('periods.index')->with('success', 'Period created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $period = Period::findOrFail($id);
        return view('period/edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $period = Period::findOrFail($id);
        $period->name = $request->input('name');
        $period->start_date = $request->input('start_date');
        $period->end_date = $request->input('end_date');
        $period->status = $request->input('status');
        $period->save();

        session()->flash('success', 'Period updated successfully!');
        return redirect()->route('periods.index')->with('success', 'Period updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $period = Period::findOrFail($id);
        $period->delete();

        session()->flash('success', 'Period deleted successfully!');
        return redirect()->route('periods.index')->with('success', 'Period deleted successfully.');
    }
}
