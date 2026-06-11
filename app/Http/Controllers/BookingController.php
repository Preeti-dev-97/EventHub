<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class BookingController extends Controller
{

    public function bookEvent($event)
    {
        $event = Event::find($event);
        return view('bookEvent', compact('event'));
    }

    public function checkout(Request $request, Event $event) 
    {
        Stripe::setApiKey( config('services.stripe.secret'));

        $tickets = $request->tickets;

        $total = $event->price * $tickets;

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $event->title
                            ],
                            'unit_amount' => $total * 100
                        ],
                        'quantity' => 1
                    ]
                ],

                'mode' => 'payment',
                'success_url' => route('payment.success'),
                'cancel_url' => url()->previous()
            ]);

        Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'quantity' => $tickets,
            'amount' => $total,
            'stripe_session_id' => $session->id
        ]);

        return redirect( $session->url );
    }

    public function success()
    {
        Booking::where('stripe_session_id', request('session_id'))->update([
            'status' => 'paid'
        ]);

        return redirect()->route('eventsList')->with('success', 'Booking completed');
    }
}
