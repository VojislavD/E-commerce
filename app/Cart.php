<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public static function total() 
    {
        $sessions = session('cart');
        $sum = 0;

        if($sessions) {
            foreach($sessions as $session) {
                $sum += $session['sum'];
            }

            if($sum > 100) {
                $shipping = 0;
                $total = $sum;
            } else {
                $shipping = 13;
                $total = $sum + $shipping;
            }
        } else {
            $sum = 0;
            $shipping = 0;
            $total = 0;
        }

        session()->put('cart_total', [
            'sum' => $sum,
            'shipping' => $shipping,
            'total' => $total
        ]);
    }

    public static function exists($id) 
    {
        if(session('cart')) {
            return array_search($id, array_column(session('cart'), 'id'));
        }
    }

    public static function removeFromSession($name, $item)
    {
        $session = session($name);
        $key = array_search($item->id, array_column($session, 'id'));
        $keys = array_keys($session);
        $key = $keys[$key];
        session()->forget($name.'.'. $key);
    }

    public static function sessionPut($key, $item, $quantity)
    {
    	session()->put('cart.'.$key, [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => $quantity,
            'description' => $item->description,
            'sum' => $item->price*$quantity,
            'image_url' => $item->image_url,
        ]);
    }
}
