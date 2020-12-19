<x-main>
	<div class="container mx-auto mb-16">
		<p class="text-3xl text-center my-8">Cart</p>
		@if (session('cartRemoved'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-8 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('cartRemoved') }}</p>
            </div>
        @endif
        @if (session('cartCleared'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-8 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('cartCleared') }}</p>
            </div>
        @endif
		<div class="flex-col lg:flex lg:flex-row lg:divide-x border-gray-400">
			<div class="w-full px-2 lg:w-3/5 lg:mx-4">
				<ul class="flex text-center md:text-lg font-semibold border-b-2 border-gray-400 pb-2 mb-8">
					<li class="w-4/6">Product</li>
					<li class="w-1/6">Price</li>
					<li class="w-1/6">Quantitiy</li>
					<li class="w-1/6">Sum</li>
				</ul>
				<ul class="flex-col items-center text-center divide-y divide-gray-400 mb-24">
					@empty($cart_items)
						<p>There is no items in cart.</p>
					@else
						@foreach($cart_items as $cart_item)
							<li class="flex text-sm md:text-base items-center my-6 pt-6">
								<form method="POST" action="/cart/remove/{{ $cart_item['id'] }}">
									@csrf
									@method('PUT')
									<button type="submit">
										<i class="w-1/6 fas fa-trash-alt hover:text-red-700"></i>
									</button>
								</form>
									
								<a class="flex items-center w-4/6 px-2 hover:text-orange-700" href="/items/{{ $cart_item['id']}}">
									<img class="hidden lg:block w-8 ml-2" src="{{ asset($cart_item['image_url']) }}">
									<span class="mx-auto">{{ $cart_item['name'] }}</span>
								</a>
								<p class="w-1/6 text-center">$ {{ $cart_item['price'] }}</p>
								<form class="flex items-center justify-center w-1/6" method="POST" action="/cart/update/{{ $cart_item['id'] }}">
									@csrf
									<input 
										class="w-2/3 text-center border border-gray-500 focus" 
										type="number" 
										name="cart_quantity" 
										min="1"
										max="100" 
										value="{{ $cart_item['quantity'] }}"
										onchange="this.form.submit()" 
									>
								</form>
								<p class="w-1/6 text-center">$ {{ $cart_item['sum'] }}</p>
							</li>
						@endforeach
					@endempty
				</ul>

				<div class="flex justify-between">
					<a class="bg-orange-600 mx-2 py-3 px-4 md:px-6 text-sm text-white font-bold hover:bg-orange-700 rounded-lg" href="/category/top"><i class="fas fa-arrow-left"></i> Resume shopping</a>
					
					@empty(!$cart_items)
						<form class="flex" method="POST" action="/cart/destroy">
							@csrf
							@method('delete')
							<button class="btn bg-red-700 mx-2 py-3 px-4 md:px-6 text-sm text-white font-bold hover:bg-red-800 rounded-lg" type="submit"><i class="fas fa-trash-alt"></i> Clear cart</button>				
						</form>
					@endempty
				</div>
				
			</div>

			<div class="w-full lg:w-2/5 mt-8 lg:mt-0">
				<p class="text-center text-lg font-semibold border-b-2 border-gray-400 pb-2 mb-8 mx-8">Cart Sum</p>

				<ul class="w-3/4 text-sm md:text-base mx-auto mb-6 divide-y divide-gray-400">
					<li class="flex justify-between py-4">
						<p>Sum</p>
						<p class="font-semibold">@empty($cart_total) 0 @else$ {{ $cart_total['sum'] }}@endempty </p>
					</li>
					<li class="flex justify-between py-4">
						<p>Shipping price</p>
						<p class="font-semibold">@empty($cart_total) 0 @else$ {{ $cart_total['shipping'] }}@endempty</p>
					</li>
					<li class="flex justify-between py-4">
						<p>Total</p>
						<p class="font-semibold">@empty($cart_total) 0 @else$ {{ $cart_total['total'] }}@endempty</p>
					</li>
				</ul>

				<p class="text-sm mx-8 my-8">*Free shipping for orders over $100</p>

				<a class="button bg-orange-600 mx-8 py-3 px-4 md:px-6 text-sm text-white font-bold hover:bg-orange-700 rounded-lg" href="/cart/complete"><i class="fas fa-arrow-right"></i> Complete order</a>
			</div>
		</div>
	</div>
</x-main>