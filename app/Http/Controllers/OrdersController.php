<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Item;

class OrdersController extends Controller
{
    protected $request;

    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('orders.admin.index', compact('orders'));
    }

    public function show(Order $order) 
    {
        $this->authorize('view', $order);
        $items = $order->items;
        $details = DB::table('item_order')->where('order_id', $order->id)->get();

        return view('orders.admin.show', compact('order','items','details'));
    }

    public function validatePayment(Request $request) {
        $stock = Order::checkStock();
        $payment = Order::checkPayment($request);

        if(session('cart')) {
            if($stock) {
                request()->validate([
                    'first_name' => ['required','string','max:255'],
                    'last_name' => ['required','string','max:255'],
                    'email' => ['required','email'],
                    'phone' => ['required','string','max:255'],
                    'postal_code' => ['required','string','max:255'],
                    'city' => ['required','string','max:255'],
                    'address' => ['required','string','max:255'],
                    'note' => ['nullable','string','max:255'],
                    'type_of_payment' => ['required', Rule::in(['card', 'delivery'])],
                    'terms' => ['required']
                ]);

                if($payment) {
                    return view('stripe.payment', compact('request'));
                } else {
                    return $this->store($request);
                }
            } else {
                Order::clearCart();
                return back()->with('itemsOutOfStock', 'Some items from cart are out of stock. Please fill your cart again with items in stock and try again.');
            }
        } else {
                return back()->with('emptyCart','Your cart is empty, fill the cart first and than you can complete order.');
        }
    }

    public function paymentProcess(Request $request) 
    {
        $cart = json_decode(request('cart'));

        \Stripe\Stripe::setApiKey("sk_test_gP9bK8Oc4oM2NPGcgqxm0Sbi00Ao0bXD0P");

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => request('total')."00",
            'currency' => 'usd',
            'description' => 'Premium Fashion Order Charge',
            'source' => $token,
        ]);

        $cart_value = array(request('sum'), request('shipping'), request('total'));
        return $this->store($request, $cart_value, $cart);
    }

    public function store(Request $request, $cart_value=null, $cart=null)
    {
        if($cart_value) {
            $cart_sum = $cart_value[0];
            $cart_shipping = $cart_value[1];
            $cart_total = $cart_value[2];
        } else {
            $cart_sum = session('cart_total')['sum'];
            $cart_shipping = session('cart_total')['shipping'];
            $cart_total = session('cart_total')['total'];
        }

        $payment = Order::checkPayment($request);

        Order::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'postal_code' => request('postal_code'),
            'city' => request('city'),
            'address' => request('address'),
            'note' => request('note'),
            'status' => 1,
            'type_of_payment' => request('type_of_payment'),
            'payment' => $payment,
            'sum' => $cart_sum,
            'shipping' => $cart_shipping,
            'total' => $cart_total,
        ]);

        if($cart) {
            foreach($cart as $session) {
                DB::table('item_order')->insert([
                    'item_id' => $session->id,
                    'order_id' => Order::orderBy('id', 'DESC')->first()->id,
                    'quantity' => $session->quantity,
                    'sum' => $session->sum
                ]);

                Item::where('id', $session->id)->decrement('stock', $session->quantity);
            }

            return redirect('/order/complete/payed');
        } else {
            foreach(session('cart') as $session) {
                DB::table('item_order')->insert([
                    'item_id' => $session['id'],
                    'order_id' => Order::orderBy('id', 'DESC')->first()->id,
                    'quantity' => $session['quantity'],
                    'sum' => $session['sum']
                ]);
                
                Item::where('id', $session['id'])->decrement('stock', $session['quantity']);
            }

            Order::clearCart();
            return redirect('/cart/complete')->with('successOrder', 'Your order is sent. We will contact you soon to confirm order.');
        }

        
    }

    public function completeOrderPayed()
    {
        Order::clearCart();
        return redirect('/cart/complete')->with('successOrder', 'Your order is sent. We will contact you soon to confirm order.');
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => 0]);

        $item = DB::table('item_order')->where('order_id', $order->id)->first();
        Item::where('id', $item->item_id)->increment('stock', $item->quantity);

        return redirect()->home()->with('orderCanceled', 'Your order is canceled.');
    }

    public function status(Order $order)
    {   
        if(request('status') === '0' && $order->status != 0) {
            $item = DB::table('item_order')->where('order_id', $order->id)->first();
            Item::where('id', $item->item_id)->increment('stock', $item->quantity);
        } else if($order->status === 0) {
            $item = DB::table('item_order')->where('order_id', $order->id)->first();
            Item::where('id', $item->item_id)->decrement('stock', $item->quantity);
        }

        $order->update(['status' => request('status')]);

        return back()->with('statusUpdated', 'Status of order is changed.');
    }

    public function edit(Order $order)
    {
        $items = $order->items;
        $details = DB::table('item_order')->where('order_id', $order->id)->get();

        return view('orders.admin.edit', compact('order', 'items', 'details'));
    }

    public function update(Order $order)
    {
        $order->update(request()->validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','email'],
            'phone' => ['required','string','max:255'],
            'postal_code' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
            'address' => ['required','string','max:255'],
            'note' => ['nullable','string','max:255'],
            'type_of_payment' => ['required', Rule::in(['card', 'delivery'])],
            'payment' => ['required','boolean'],
        ]));

        return redirect('order/'.$order->id)->with('orderUpdated', 'Order details are successfully updated.');
    }

    public function search()
    {
        $orders = Order::where('first_name', 'LIKE','%'.request('keyword').'%')->orWhere('last_name','LIKE','%'.request('keyword').'%')->paginate(10);
        
        return view('orders.admin.index', compact('orders'));
    }

    public function filter()
    {
        if(request('status') === 'all') {
            $orders = Order::paginate(10);
        } else {
            $orders = Order::where('status', request('status'))->paginate(10);
        }
        
        return view('orders.admin.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $item = DB::table('item_order')->where('order_id', $order->id)->first();
        Item::where('id', $item->item_id)->increment('stock', $item->quantity);

        $order->delete();

        return redirect('/admin/orders')->with('orderDeleted', 'Order is successfully deleted.');
    }
}
