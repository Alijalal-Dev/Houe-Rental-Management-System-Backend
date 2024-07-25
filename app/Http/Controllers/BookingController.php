<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\User;


class BookingController extends Controller
{
    public function index()
    {
        //$user =User::find(Auth::id());
        $user = Auth::user();
        $bookings = $user->bookings->each(function($item){
            $item->property;
            $item->user;
        });


        return response()->json($bookings);
    }

    public function store(Request $request)
    {
        //return response()->json(Auth::user());
        $validatedData = $request->validate([
            'property_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking = Booking::create([
            'property_id' => $validatedData['property_id'],
            'user_id' => Auth::id(),
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        return response()->json($booking, 201);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $booking->update($validatedData);

        return response()->json($booking, 200);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(null, 204);
    }
}
