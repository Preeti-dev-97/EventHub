<?php

namespace App\Http\Controllers;

use App\Mail\BookingSuccessMail;
use App\Models\Booking;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        if ($request->tickets > $event->remainingSeats()) {
            return back()->withErrors([
                'tickets' => 'Not enough seats'
            ])->withInput();
        }

        Stripe::setApiKey(config('services.stripe.secret'));

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
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => url()->previous()
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'quantity' => $tickets,
            'amount' => $total,
            'stripe_session_id' => $session->id
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        try {
            DB::beginTransaction();
            $booking = Booking::where('stripe_session_id', request('session_id'))
                ->lockForUpdate()
                ->first();

            if (!$booking) {
                throw new Exception('Booking not found');
            }

            if ($booking->status !== 'paid') 
            {
                $booking->update(['status' => 'paid']);

                // Mail::to($booking->user->email)->queue(new BookingSuccessMail($booking));
            }

            DB::commit();

            return redirect()->route('eventsList')->with('success', 'Booking completed');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
