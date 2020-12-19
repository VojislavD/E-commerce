<x-main>
	<div class="container mx-auto mb-16">
		<p class="text-xl md:text-3xl text-center my-8 border-b-2 w-1/4 mx-auto border-orange-600">Wish List</p>
		@if (session('wishlistRemoved'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-4 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('wishlistRemoved') }}</p>
            </div>
        @endif
		<div class="px-3 w-full border-gray-400">
			<ul class="w-full flex text-center text-lg font-semibold border-b-2 border-gray-400 pb-2 mb-8">
				<li class="w-4/6">Product</li>
				<li class="w-1/6">Price</li>
				<li class="w-1/6"></li>
			</ul>

			<div class="w-full">
				<ul class="flex-col items-center text-center divide-y divide-gray-400 mb-24">
					@empty($wishlist)
						<p class="text-lg py-16">There is no items in wishlist</p>
					@else
						@foreach($wishlist as $item)
							<li class="flex items-center my-6 pt-6">
								<form method="POST" action="/wishlist/remove/{{ $item['id'] }}">
									@csrf
									@method('PUT')
									<button type="submit">
										<i class="w-1/6 fas fa-trash-alt hover:text-red-700"></i>
									</button>
								</form>
								
								<a class="flex items-center w-4/6 px-2 hover:text-orange-700" href="/items/{{ $item['id'] }}">
									<img class="hidden md:block w-12 ml-8 bg-orange-600" src="{{ asset($item['image_url']) }}">
									<span class="mx-auto">{{ $item['name'] }}</span>
								</a>
								<p class="w-1/6">$ {{ $item['price'] }} </p>
								<form class="w-1/6" method="POST" action="/cart/add/wishlist/{{ $item['id'] }}">
									@csrf
									<button class="bg-orange-600 py-2 px-2 md:px-4 text-xs md:text-sm text-white font-bold hover:bg-orange-700" type="submit">
										Add To Cart
									</button>
								</form>
							</li>
						@endforeach
					@endempty
				</ul>
				<a class="w-1/4 btn bg-orange-600 mx-2 py-3 px-6 text-sm text-white font-bold hover:bg-orange-700 rounded-lg" href="/category/top"><i class="fas fa-arrow-left"></i> Resume shopping</a>
			</div>
		</div>
	</div>
</x-main>