<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Item;

class Order extends Model
{
	protected $fillable = ['first_name','last_name','email','phone','postal_code','city','address','note','sum','shipping','total','type_of_payment', 'payment','status'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'email','email');
    }

    public function items()
    {
    	return $this->belongsToMany(Item::class);
    }

    public static function checkStock()
    {
    	$stock = true;
        foreach(session('cart') as $session) {
            $item_stock = Item::where('id', $session['id'])->first()->stock;
            
            if($item_stock <= 0) {
                $stock = false;
                break;
            }
        }

        return $stock;
    }

    public static function checkPayment($request)
    {
    	if($request['type_of_payment'] == 'card') {
            return true;
        } else {
            return false;
        }
    }

    public static function clearCart()
    {
    	session()->forget('cart');
		session()->forget('cart_total');
    }

}
