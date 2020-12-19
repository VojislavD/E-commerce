<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Review;
use App\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        if($user->isAdmin()) {
            $orders = Order::take(10)->latest()->get();
            $reviews = Review::take(10)->latest()->get();
            $users = User::take(10)->latest()->get();
            return view('adminHome', compact('orders', 'reviews', 'users','user'));
        } else {
            $orders = Order::where('email', auth()->user()->email)->latest()->paginate(10);
            return view('userHome', compact('orders','user'));
        }
    }
}
