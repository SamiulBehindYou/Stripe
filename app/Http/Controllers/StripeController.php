<?php

namespace App\Http\Controllers;

use App\Models\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.stripe');
    }

    public function charge(Request $request){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $charge = $stripe->charges->create([
        'amount' => $request->total * 100,
        'currency' => 'usd',
        'source' => $request->stripeToken,
        'description' => 'Payment for order #1234',
        ]);
        // dd($request->all(), $charge);

        // Save the charge details to the database
        Stripe::create([
            'payment_id' => $charge->id,
            'payment_status' => $charge->status,
            'amount' => $charge->amount / 100,
            'currency' => $charge->currency,
            'description' => $charge->description,
            'stripe_token' => $charge->source->id,
        ]);

        toastr()->success('Payment successfully done!.');
        return back();
    }
}
