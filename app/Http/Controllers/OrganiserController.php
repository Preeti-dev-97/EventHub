<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;

class OrganiserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $hasSubscription = $user->subscribed('default');

        return view('organiser.dashboard', compact('hasSubscription'));
    }

    public function plans()
    {
        $plans = SubscriptionPlan::where('is_active', true)->get();
        return view('organiser.plans', compact('plans'));
    }

    public function subscribe($id)
    {
        $plan = SubscriptionPlan::find($id);

        return auth()->user()->newSubscription('default', $plan->stripe_price_id)
            ->checkout([
                'success_url' => route('plans.success'),
                'cancel_url' => route('plans.cancel')
            ]);
    }

    public function success()
    {
        return redirect()->route('organiser.events.index')->with('success', 'Subscription active');
    }

    public function cancel()
    {
        return redirect()->route('organiser_dashboard')->with('error', 'Subscription cancelled');
    }
}
