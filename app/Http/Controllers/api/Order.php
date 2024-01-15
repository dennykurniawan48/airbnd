<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BookingDate;
use App\Models\Property;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class Order extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = BookingDate::where('user_id', '=', request()->user()->id)->with('property.area.country')->get(); 
        return response()->json(["data" => $order]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            "property"=> "string",
            "start" => 'required|date_format:Y-m-d',
            "end" => 'required|date_format:Y-m-d',
            "adult" =>"required|integer",
            "kid" =>"required|integer",
        ]);

        $periods = CarbonPeriod::create($validate['start'], $validate['end']);
        $property = Property::where('slug', '=', $validate['property'])->firstOrFail();
        $order = new BookingDate();
        $order->property_id = $property->id;
        $order->adult = $validate['adult'];
        $order->kids = $validate['kid'];
        $order->start = $validate['start'];
        $order->end = $validate['end'];
        $order->total = $property->price * count($periods);
        $order->paid = false;
        $order->user_id = $request->user()->id;
        $order->save();

        return response()->json(['data' => $order]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = BookingDate::where('id', '=', $id)->with('property.area.country')->firstOrFail();
        return response()->json(['data'=> $order]);
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
