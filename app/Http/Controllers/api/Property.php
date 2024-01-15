<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BookingDate;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class Property extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = \App\Models\Property::with('area.country')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = \App\Models\Property::where('slug', '=', $id)->with('area.country', 'category')->firstOrFail();
        $bookedDate = [];
        $booked = BookingDate::where('property_id', '=' ,$data->id)->get();
        foreach ($booked as $book) {
            $periods = CarbonPeriod::create($book->start, $book->end);
            foreach ($periods as $period) {
                $bookedDate[] = Carbon::parse($period)->format('Y-m-d');
            }
        }
        return response()->json([
            'data' => [
                "property" => $data,
                "booked" => $bookedDate
            ]
        ]);
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
