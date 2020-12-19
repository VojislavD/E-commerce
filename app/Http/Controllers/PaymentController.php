<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentProcess()
    {
    	\Stripe\Stripe::setApiKey("sk_test_gP9bK8Oc4oM2NPGcgqxm0Sbi00Ao0bXD0P");

    	$token = $_POST['stripeToken'];
    	$charge = \Stripe\Charge::create([
    		'amount' => session('cart_total')['total']."00",
    		'currency' => 'usd',
    		'description' => 'Premium Fashion Order Charge',
    		'source' => $token,
    	]);
    }
}
