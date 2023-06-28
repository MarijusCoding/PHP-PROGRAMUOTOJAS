<?php

namespace App\Http\Controllers;

use App\Models\Trucks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required|alpha_num|uppercase|unique:App\Models\Trucks,Unit',
            'year' => [
                'required',
                'date_format:Y',
                function ($attribute, $value, $fail) {
                    $inputDate = Carbon::createFromFormat('Y', $value);
                    $currentYear = Carbon::now()->year;
                    $maxYear = $currentYear + 5;
                    if ($inputDate->year < 1900 || $inputDate->year > $maxYear) {
                        $fail("The allowed date range is from 1900 to {$maxYear} years.");
                    }
                },
            ]
        ]);
        Trucks::create([
            'Unit' => $request->input('unit'),
            'Year' => $request->input('year'),
            'Note' => $request->input('note')
        ]);
        return view('welcome', [
            'msg' => 'Truck created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
