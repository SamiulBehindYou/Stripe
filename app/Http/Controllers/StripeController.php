<?php

namespace App\Http\Controllers;

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
        
        toastr()->success('Payment successfully done!.');
        return back();
        // dd($request->all(), $charge);
    }
}
