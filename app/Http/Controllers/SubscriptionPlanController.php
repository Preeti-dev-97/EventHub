<?php
namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::latest()->get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'event_limit' => 'required',
            'stripe_price_id' => 'required'
        ]);

        SubscriptionPlan::create($request->all());

        return redirect()->route('plans.index');
    }

    public function edit($id)
    {
        $plan = SubscriptionPlan::find($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'event_limit' => 'required',
            'stripe_price_id' => 'required'
        ]);

        $plan = SubscriptionPlan::find($id);

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
