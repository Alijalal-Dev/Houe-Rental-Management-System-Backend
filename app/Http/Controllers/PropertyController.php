<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Booking;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::whereNotIn("id",Booking::pluck('property_id')->toArray())->get();

        return response()->json($properties);
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        return response()->json($property);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property = Property::create($validatedData);

        return response()->json($property, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property = Property::findOrFail($id);
        $property->update($validatedData);

        return response()->json($property, 200);
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json(null, 204);
    }

    public function searchProperties(Request $request)
{
    $location = $request->input('location');
    $priceMin = $request->input('priceMin');
    $priceMax = $request->input('priceMax');
    $amenities = $request->input('amenities');

    $query = Property::query();

    // Add conditions to the query based on the provided search criteria
    if ($location) {
        $query->where('location', 'LIKE', '%' . $location . '%');
    }

    if ($priceMin) {
        $query->where('price', '>=', $priceMin);
    }

    if ($priceMax) {
        $query->where('price', '<=', $priceMax);
    }

    if ($amenities) {
        $query->whereIn('amenity', $amenities);
    }

    $properties = $query->get();

    return response()->json($properties);
}

}
