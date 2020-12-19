<x-main>
	<div class="container mx-auto min-h-screen py-12">
		@guest
			<p class="mx-4 text-gray-600">Already have account? <a class="text-orange-600" href="/login">Click here to log in</a> </p>
		@endguest
		@if(session('successOrder'))
            <p class="my-4 mx-4 text-green-600 font-semibold"> {{ session('successOrder') }} </p>
        @endif

        @if(session('emptyCart'))
            <p class="my-4 ml-8 text-red-600 font-semibold"> {{ session('emptyCart') }} </p>
        @endif
        @if(session('itemsOutOfStock'))
            <p class="my-4 ml-8 text-red-600 font-semibold"> {{ session('itemsOutOfStock') }} </p>
        @endif
		<div class="flex flex-col lg:flex-row my-8 mx-4">
			<div class="w-full lg:w-1/2 px-4 lg:mx-4 border-2 border-orange-600 p-8">
				<p class="text-xl text-center lg:text-left font-semibold mb-8 uppercase">Your order</p>

				<ul class="flex justify-around text-center border-b-2 border-gray-500">
					<li class="w-4/6 text-centertext-lg font-semibold mb-2"> Product </li>
					<li class="w-1/6 text-centertext-lg font-semibold mb-2"> Quantity </li>
					<li class="w-1/6 text-center text-lg font-semibold mb-2">Sum</li>
				</ul>

				<ul class="text-center mb-6 pb-4 divide-y divide-grey-500 border-b-2 border-gray-500">
					@empty(!$cart_items)
						@foreach($cart_items as $cart_item)
							<li class="flex justify-around my-2 pt-4">
								<p class="w-4/6">{{ $cart_item['name'] }}</p>
								<p class="w-1/6"> x {{ $cart_item['quantity'] }} </p>
								<p class="w-1/6 font-semibold">$ {{ $cart_item['price']}}</p>
							</li>
						@endforeach
					@endempty
				</ul>

				<ul class="mb-24">
					@empty(!$cart_total)
						<li class="flex justify-around my-2 pt-4">
							<p class="w-2/3">Sum</p>
							<p class="w-1/3 font-semibold">$ {{ $cart_total['sum'] }}</p>
						</li>
						<li class="flex justify-around my-2 pt-4">
							<p class="w-2/3">Shipping price</p>
							<p class="w-1/3 font-semibold">$ {{ $cart_total['shipping'] }}</p>
						</li>
						<li class="flex justify-around my-2 pt-4">
							<p class="w-2/3">Total</p>
							<p class="w-1/3 font-semibold">$ {{ $cart_total['total'] }}</p>
						</li>
					@endempty
				</ul>
			</div>
			<form class="flex-col w-full text-sm lg:text-base lg:w-1/2 lg:border-t-2 lg:border-gray-500 px-8" method="POST" action="/order/confirm">
				@csrf
				<p class="text-xl text-center lg:text-left font-semibold mt-16 mb-4 lg:mt-8 lg:mb-8 uppercase">Billing Details</p>

				<input 
					class="w-full mx-auto h-8 my-2 px-2 border @error('first_name') border-red-600 @enderror border-gray-500" 
					type="text" 
					name="first_name" 
					placeholder="First name" 
					value="@auth{{ auth()->user()->first_name }}@else{{ old('first_name') }}@endauth"
					required 
				>
				@error('first_name')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('first_name') }}</p>
                @enderror

				<input 
					class="w-full h-8 my-2 px-2 border @error('last_name') border-red-600 @enderror border-gray-500" 
					type="text" 
					name="last_name" 
					placeholder="Last name"
					value="@auth{{ auth()->user()->last_name }}@else{{ old('last_name') }}@endauth" 
					required
				>
				@error('last_name')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('last_name') }}</p>
                @enderror

				<input 
					class="w-full h-8 my-2 px-2 border @error('email') border-red-600 @enderror border-gray-500" 
					type="email" 
					name="email" 
					placeholder="Email"
					value="@auth{{ auth()->user()->email }}@else{{ old('email') }}@endauth" 
					required
				>
				@error('email')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('email') }}</p>
                @enderror

				<input 
					class="w-full h-8 my-2 px-2 border @error('phone') border-red-600 @enderror border-gray-500" 
					type="text" 
					name="phone" 
					placeholder="Phone number"
					value="@auth{{ auth()->user()->phone }}@else{{ old('phone') }}@endauth" 
					required
				>
				@error('phone')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('phone') }}</p>
                @enderror

				<input 
					class="w-full h-8 my-2 px-2 border @error('postal_code') border-red-600 @enderror border-gray-500" 
					type="text" 
					name="postal_code" 
					placeholder="Postal codes"
					value="@auth{{ auth()->user()->postal_code }}@else{{ old('postal_code') }}@endauth" 
					required
				>
				@error('postal_code')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('postal_code') }}</p>
                @enderror

				<input 
					class="w-full h-8 my-2 px-2 border @error('city') border-red-600 @enderror border-gray-500" 
					type="text" 
					name="city" 
					placeholder="City"
					value="@auth{{ auth()->user()->city }}@else{{ old('city') }}@endauth" 
					required
				>
				@error('city')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('city') }}</p>
                @enderror
				
				<input 
					class="w-full h-8 my-2 px-2 border @error('address') border-red-600 @enderror border-gray-500" 
					type="text" 
					name="address" 
					placeholder="Address"
					value="@auth{{ auth()->user()->address }}@else{{ old('address') }}@endauth" 
					required
				>
				@error('address')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('address') }}</p>
                @enderror

				<textarea class="w-full h-24 px-2 border @error('note') border-red-600 @enderror border-gray-500" name="note" placeholder="Note"></textarea>
				@error('note')
                    <p class="text-sm text-red-600 font-semibold">{{ $errors->first('note') }}</p>
                @enderror

                <div class="flex-col my-4 text-base @error('type_of_payment') border-red-600 @enderror">
                	<label class="font-semibold">Choose Type Of Payment:</label>
                	<div class="flex items-center ml-6 my-2">
                		<input class="mx-4" type="radio" id="card" name="type_of_payment" value="card" required>
                		<label for="card">Card</label>
                	</div>
                	<div class="flex items-center ml-6 my-2">
                		<input class="mx-4" type="radio" id="delivery" name="type_of_payment" value="delivery" required>
                		<label for="delivery">On Delivery</label>
                	</div>	

                	@error('type_of_payment')
                    	<p class="text-sm text-red-600 font-semibold">{{ $errors->first('type_of_payment') }}</p>
                	@enderror
                </div>
                <div class="text-lg mb-4 @error('terms') border-red-600 @enderror">
					<input type="checkbox" name="terms" id="terms" required>
                	<label for="terms">I agree to </label><a class="text-orange-600 cursor-pointer" onclick="showTerms()">terms of use</a>
                	@error('terms')
                    	<p class="text-sm text-red-600 font-semibold">{{ $errors->first('terms') }}</p>
                	@enderror
                </div>
				<button 
					class="bg-orange-600 px-8 py-3 mt-2 rounded text-sm text-white font-bold hover:bg-orange-700 uppercase" 
					type="submit"
					@empty(session('cart')) disabled @endempty
				>
					<i class="fas fa-check-circle"></i> Order
				</button>
			</form>
		</div>
	</div>

	<div id="modal" class="hidden w-full h-full py-16 bg-black fixed top-0 left-0" style="background-color: rgba(0,0,0,0.7)">
		<div class="flex flex-col items-end w-2/3 h-full mx-auto bg-white overflow-scroll">
			<span class="p-2 -mt-2 -ml-1 text-2xl font-bold hover:text-orange-600 cursor-pointer fixed" onclick="hideTerms()">x</span>
			
			<div class="flex flex-col w-full items-center px-4 lg:px-32 mt-16">
				<h1 class="text-2xl underline text-center mb-8">Terms Of Use</h1>
				<p>The standard Lorem Ipsum passage, used since the 1500s "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br>

				<p>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p><br>

				<p>1914 translation by H. Rackham "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p><br>

				<p>Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."</p><br>

				<p>1914 translation by H. Rackham "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."</p>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		const modal = document.querySelector('#modal');

		function showTerms() {
			modal.style.display = "block";
		}

		function hideTerms() {
			modal.style.display = "none";
		}
	</script>
</x-main>