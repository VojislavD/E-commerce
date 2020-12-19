<x-master>
	<div class="h-screen flex flex-col items-center justify-center bg-grey-300 px-4">
		<h1 class="text-indigo-700 text-center text-lg md:text-2xl font-bold">You choose to pay with card.</h1>
		<h2 class="text-indigo-700 text-center text-lg md:text-xl">Please make payment via Stripe by clicking button below.</h2>
		<form class="mt-4" action="/api/payment" method="POST">
                <input type="hidden" name="first_name" value="{{ $request['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $request['last_name'] }}">
                <input type="hidden" name="email" value="{{ $request['email'] }}">
                <input type="hidden" name="phone" value="{{ $request['phone'] }}">
                <input type="hidden" name="postal_code" value="{{ $request['postal_code'] }}">
                <input type="hidden" name="city" value="{{ $request['city'] }}">
                <input type="hidden" name="address" value="{{ $request['address'] }}">
                <input type="hidden" name="note" value="{{ $request['note'] }}">
                <input type="hidden" name="type_of_payment" value="card">
                <input type="hidden" name="sum" value="{{ session('cart_total')['sum']}}">
                <input type="hidden" name="shipping" value="{{ session('cart_total')['shipping']}}">
                <input type="hidden" name="total" value="{{ session('cart_total')['total'] }}">
                <textarea name="cart" hidden> @json(session('cart')) </textarea>
            <script 
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_hjMMQuFEt7zviKqx6PvJz0Y700Tsr95ETC"
                data-amount="{{ session('cart_total')['total']}}00" 
                data-name="Premium Fashion"
                data-description="Order Payment"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-curency="sgd"
            ></script>
        </form>
	</div>
</x-master>