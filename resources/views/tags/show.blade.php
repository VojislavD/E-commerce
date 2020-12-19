<x-main>
	<div class="container mx-auto mb-24 mt-8">
		<div class="flex-col text-center lg:flex lg:flex-row lg:justify-between mb-8">
			<p class="text-2xl lg:text-3xl border-b-4 border-orange-600 mx-2">{{ $tag->name }}</p>

			<form class="mt-6 lg:mt-0 text-center md:text-right" method="GET" action="/tags/{{ $tag->name }}/sort">
				<label><i class="fas fa-sort"></i> Sort by:</label>
				<select class="px-4 mx-2 border border-gray-600" name="sort" onchange="this.form.submit()">
					<option selected>Choose</option>
					<option value="newest">Newest</option>
					<option value="oldest">Oldest</option>
					<option value="price_ascending">By price ascending</option>
					<option value="price_descending">By price descending</option>
				</select>
			</form>
			
		</div>
		<div class="flex">
			<div class="hidden lg:block w-1/4 pr-4">
				<p class="text-2xl">Categories</p>

				<ul class="mt-8 text-lg text-orange-600 divide-y divide-gray-500">
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/trousers">Trousers</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/sweatpants">Sweatpants</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/dresses">Dresses</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/skirts">Skirts</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/t-shirts">T-Shirts</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/shirts">Shirts</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/sweaters">Sweaters</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/jackets">Jackets</a>
					</li>	
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/sneakers">Sneakers</a>
					</li>	
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/shoes">Shoes</a>
					</li>	
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/boots">Boots</a>
					</li>
					<li class="my-1 py-1 pl-4">
						<a class="hover:text-orange-800" href="/category/handbags">Handbags</a>
					</li>
				</ul>
			</div>

			<div class="w-full lg:w-3/4 px-4">
				@if(!count($items))
					<p class="text-lg">There is no items.</p>
				@else
					<ul class="flex flex-col md:flex-row md:justify-start flex-wrap">
						@foreach($items as $item)
			                <li class="w-full md:w-1/4 shadow-xl p-4 m-h-32 my-4">
			                	<form method="POST" action="/wishlist/add/{{ $item->id }}">
		                            @csrf
		                            <button>
		                                <i class="fas fa-heart fa-2x absolute mt-1 ml-2 text-orange-600 hover:text-orange-700 cursor-pointer transition duration-200" title="Add To Wishlist"></i>
		                            </button>
		                        </form>
		                        <a href="/items/{{ $item->id }}">
		                            <img class="h-48 mx-auto" src="{{ asset($item->image_url) }}">
		                            <p class="text-center md:text-left text-sm text-gray-600">{{ $item->category->name }}</p>
		                            <p class="text-center md:text-left h-10 md:h-20 mb-4">{{ substr($item->name,0,50) }}...</p>
		                            <p class="text-center md:text-left font-bold mb-5">${{ $item->price }}</p>
		                        </a>
		                        @if($item->stock > 0)
		                            <form class="flex justify-center md:justify-start" method="POST" action="/cart/add/{{ $item->id }}">
		                				@csrf
			                            <button class="bg-orange-600 py-2 px-4 text-sm text-white font-bold hover:bg-orange-700 transition duration-200" type="submit">Add To Cart</button>
			                        </form>
		                        @else
		                            <p class="text-red-600 font-bold text-center">Out of stock</p>
		                        @endif
		                    </li>
						@endforeach
		            </ul>

		            {{ $items->appends(request()->except('page'))->links() }}

		        @endif
			</div>
		</div>
	</div>
</x-main>