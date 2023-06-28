<?php

namespace App\Http\Controllers;

use App\Models\Subunit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class SubunitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subunit.index');
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
        // truck’as pats sau nebūtų uždėtas kaip subunit’as [YRA]
        $request->validate([
            'main_truck' => 'required|alpha_num|uppercase|different:subunit|exists:App\Models\Trucks,Unit',
            'subunit' => 'required|alpha_num|uppercase|exists:App\Models\Trucks,Unit',
            'start_date' => 'required|date_format:Y-m-d|before:end_date',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date'
        ]);
        if (Subunit::exists()) {
            // kad nepersikirstų subunit’ų datos [YRA]
            $main = Subunit::where('main_truck', $request->input('main_truck'))
                            ->whereDate('end_date', '<=', $request->input('start_date'))
                            ->first();

            if ($main === NULL) {
                // echo "Neatitiko (susikerta datos)";
                return Redirect::back()
                                ->withErrors('This date is occupied');
            }
            else {
                // echo "Nesusikerta datos!!!!!<br><br>";
                // echo "Startas: ".$request->input('start_date')."<br>";
                // echo "Pabaiga: ".$request->input('end_date')."<br>";
                // ATITIKO DATOS 
                $subunit = Subunit::where('');
            }
        }
        else {
            Subunit::create([
                'main_truck' => $request->input('main_truck'),
                'subunit' => $request->input('subunit'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]);
            echo " Sukurtas irasas";
        }
        
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Subunit $subunit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subunit $subunit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subunit $subunit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subunit $subunit)
    {
        //
    }
}
