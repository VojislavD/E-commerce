<x-user>
	<div class="container mx-auto pb-8">
		@if (session('statusUpdated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('statusUpdated') }}</p>
            </div>
        @endif
		<h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Order</h1>
		<div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
		    <table class="w-full table-auto text-sm md:text-base">
				<thead>
					<th class="w-4/6 pt-4">Item</th>
					<th class="w-1/6 pt-4">Quantity</th>
					<th class="w-1/6 pt-4">Sum</th>
				</thead>
				<tbody >
					@if(count($items))
						@for($i = 0; $i < count($items); $i++)
							<tr class="bg-gray-200">
						      	<td class="w-4/6 text-center border px-1 lg:px-4 py-2">
						      		<a class="hover:text-orange-600" href="/items/{{ $items[$i]->id }}">{{ $items[$i]->name }}</a>
						      	</td>
						      	<td class="w-1/6 text-center border px-1 lg:px-4 py-2">
						      		{{ $details[$i]->quantity }}
						      	</td>
						      	<td class="w-1/6 text-center border px-1 lg:px-4 py-2">
						      		$ {{ $details[$i]->sum }}
						      	</td>
						    </tr>
						@endfor
					@else
						<tr class="bg-gray-200">
							<p class="text-center text-base lg:text-lg mt-4">There is no items.</p>
						</tr>
					@endif			
				</tbody>
			</table>
			<form method="POST" action="/admin/order/{{ $order->id }}/update">
				@method('PUT')
				@csrf
				<table class="w-full table-auto mt-2">
					<caption class="text-xl font-bold pt-4">Order details</caption>
					<tbody>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Id</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input class="w-full border border-gray-400 p-2" type="text" name="id" value="{{ $order->id }}" disabled>
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">First Name</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('first_name') border-red-600 @enderror" 
					      			type="text" 
					      			name="first_name" 
					      			value="{{ $order->first_name }}"
					      			required
					      		>
					      		@error('first_name')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('first_name') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Last Name</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('last_name') border-red-600 @enderror" 
					      			type="text" 
					      			name="last_name" 
					      			value="{{ $order->last_name }}"
					      			required
					      		>
					      		@error('last_name')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('last_name') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Email</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('email') border-red-600 @enderror" 
					      			type="email" 
					      			name="email" 
					      			value="{{ $order->email }}"
					      			required
					      		>
					      		@error('email')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('email') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Phone</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('phone') border-red-600 @enderror" 
					      			type="text" 
					      			name="phone" 
					      			value="{{ $order->phone }}"
					      			required
					      		>
					      		@error('phone')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('phone') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					   	<tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Postal Code</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('postal_code') border-red-600 @enderror" 
					      			type="text" 
					      			name="postal_code" 
					      			value="{{ $order->postal_code }}"
					      			required
					      		>
					      		@error('postal_code')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('postal_code') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">City</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('city') border-red-600 @enderror" 
					      			type="text" 
					      			name="city" 
					      			value="{{ $order->city }}"
					      			required
					      		>
					      		@error('city')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('city') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Address</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input 
					      			class="w-full border border-gray-400 p-2 @error('address') border-red-600 @enderror" 
					      			type="text" 
					      			name="address" 
					      			value="{{ $order->address }}"
					      			required
					      		>
					      		@error('address')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('address') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Note</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<textarea 
					      			class="w-full border border-gray-400 p-2 @error('note') border-red-600 @enderror" 
					      			rows="4" 
					      			name="note"
					      		>{{ $order->note }}</textarea>
					      		@error('note')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('note') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Type Of Payment</td>
					      	<td class="w-5/6 px-4 py-2">
								<select 
									class="border border-gray-400 p-2 @error('type_of_payment') border-red-600 @enderror" 
									name="type_of_payment"
									required
								>
									<option @if($order->type_of_payment == 'card') selected @endif value="card">Credit Card</option>
									<option @if($order->type_of_payment == 'delivery') selected @endif value="delivery">On Delivery</option>
								</select>
								@error('type_of_payment')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('type_of_payment') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Payment</td>
					      	<td class="w-5/6 px-4 py-2">
								<select 
									class="border border-gray-400 p-2 @error('payment') border-red-600 @enderror" 
									name="payment"
									required
								>
									<option @if($order->payment) selected @endif value="1">Finished</option>
									<option @if(!$order->payment) selected @endif value="0">Waiting</option>
								</select>
								@error('payment')
	                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('payment') }}</p>
	                            @enderror
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Status</td>
					      	<td class="w-5/6 px-4 py-2">
								@switch($order->status)
						      		@case(0)
						      			<input class="w-full bg-red-600 text-white border border-gray-400 p-2" value="Canceled" disabled>
						      		@break
						      		@case(1)
						      			<input class="w-full bg-yellow-500 border border-gray-400 p-2" value="Waiting" disabled>
						      		@break
						      		@case(2)
						      			<input class="w-full bg-blue-600 text-white border border-gray-400 p-2" value="Sent" disabled>
						      		@break
						      		@case(3)
						      			<input class="w-full bg-green-600 text-white border border-gray-400 p-2" value="Finished" disabled>
						      		@break
						      	@endswitch
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Created At</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input class="w-full border border-gray-400 p-2" type="date" name="created_at" value="{{ $order->created_at->isoFormat('YYYY-MM-DD') }}" disabled>
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Sum</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input class="w-full border border-gray-400 p-2" type="number" step="0.01" min="0" name="sum" value="{{ $order->sum }}" disabled>
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Shipping</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input class="w-full border border-gray-400 p-2" type="number" step="0.01" min="0" name="address" value="{{ $order->shipping }}" disabled>
					      	</td>
					    </tr>
					    <tr>
					      	<td class="w-1/6 text-center font-bold px-4 py-2">Total</td>
					      	<td class="w-5/6 px-4 py-2">
					      		<input class="w-full border border-gray-400 p-2" type="number" step="0.01" min="0" name="total" value="{{ $order->total }}" disabled>
					      	</td>
					    </tr>
					</tbody>
				</table>

				<div class="flex justify-end items-center pr-4 mt-8">
	                <button class="button text-white text-sm px-6 py-2 mx-2 bg-green-600 hover:bg-green-700 rounded-lg" type="submit"><i class="fas fa-save"></i> Update</button>
	                
	                <a class="button text-white text-sm rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2 mx-2" href="{{ url()->previous() }}"><i class="fas fa-ban"></i> Cancel</a>
	            </div>
			</form>
		</div>


	</div>
</x-user>