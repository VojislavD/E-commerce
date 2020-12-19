<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Cart;

class CartController extends Controller
{
	public function index()
	{
		$cart_items = session('cart');
        $cart_total = session('cart_total');
		
        return view('cart.index', compact('cart_items', 'cart_total'));
	}

    public function store(Item $item)
    {
        $key = Cart::exists($item->id);
        if($key === null || $key === false){
        	session()->push('cart', [
        		'id' => $item->id,
        		'name' => $item->name,
        		'price' => $item->price,
                'quantity' => 1,
        		'description' => $item->description,
                'sum' => $item->price,
                'image_url' => $item->image_url,
        	]);
        } else {
            $quantity = session('cart')[$key]['quantity'];
            $quantity++;
            Cart::sessionPut($key, $item, $quantity);
        }

	 	Cart::total();
    	return redirect()->route('cart');
    }

    public function complete()
    {
        $cart_items = session('cart');
        $cart_total = session('cart_total');

        return view('cart.complete', compact('cart_items', 'cart_total'));
    }

    public function update(Item $item)
    {
        $key = Cart::exists($item->id);
        $quantity = (int)request('cart_quantity');
        Cart::sessionPut($key, $item, $quantity);
        Cart::total();

        return redirect()->route('cart');
    }

    public function remove(Item $item)
    {
    	Cart::removeFromSession('cart', $item);
        Cart::total();

    	return back()->with('cartRemoved', 'Items successfully removed from cart.');
    }

    public function storeFromWishlist(Item $item)
    {
        Cart::removeFromSession('wishlist', $item);
        $this->store($item);

        return redirect()->route('cart');
    }
    
    public function destroy() 
    {
        session()->forget('cart');

        Cart::total();
        return back()->with('cartCleared', 'All items successfully removed from cart.');
    }
}
