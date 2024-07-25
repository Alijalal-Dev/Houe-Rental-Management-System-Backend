<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['title', 'description', 'price', 'location', 'image'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
