<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'banner', 'address', 'city', 'state', 'country', 'date', 'start', 'end', 'price', 'capacity', 'status', 'contact_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookedSeats()
    {
        return $this->bookings()
            ->where('status','paid')
            ->sum('quantity');
    }

    public function remainingSeats()
    {
        return max(0, $this->capacity - $this->bookedSeats());
    }

    public function soldOut()
    {
        return $this->remainingSeats() <= 0;
    }
}
