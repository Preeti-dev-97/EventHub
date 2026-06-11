<?php

namespace App\Observers;

use App\Models\Booking;

class BookingObserver
{
    public function updating(Booking $booking)
    {
        $becomingPaid = $booking->getOriginal('status') !== 'paid' && $booking->status === 'paid';

        if(!$becomingPaid)
        {
            return;
        }

        $event = $booking->event;

        if($booking->tickets > $event->remainingSeats())
        {
            throw new \Exception(
                'Not enough seats available'
            );
        }
    }
}