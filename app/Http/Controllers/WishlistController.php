<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class WishlistController extends Controller
{
    public function index()
    {
    	$wishlist = session('wishlist');
    	return view('wishlist.index', compact('wishlist'));
    }

    public function store(Item $item)
    {
    	$key = $this->exists($item->id);
        if($key === null || $key === false){
        	session()->push('wishlist', [
        		'id' => $item->id,
        		'name' => $item->name,
        		'price' => $item->price,
                'image_url' => $item->image_url
        	]);
        } else {
            session()->put('wishlist.'.$key, [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'image_url' => $item->image_url
            ]);
        }

    	return redirect()->route('wishlist');
    }

    public function exists($id) 
    {
        if(session('wishlist')) {
            return array_search($id, array_column(session('wishlist'), 'id'));
        }
    }

    public function remove(Item $item)
    {
		$session = session('wishlist');
    	$key = array_search($item->id, array_column($session, 'id'));
    	$keys = array_keys($session);
    	$key = $keys[$key];
    	session()->forget('wishlist.'. $key);

    	return back()->with('wishlistRemoved', 'Item successfully removed from wishlist.');
    }
}
