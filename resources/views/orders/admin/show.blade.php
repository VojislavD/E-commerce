<x-user>
	<div class="container mx-auto">
		@if (session('statusUpdated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('statusUpdated') }}</p>
            </div>
        @endif
        @if (session('orderUpdated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('orderUpdated') }}</p>
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
			

			<table class="w-full table-auto text-sm md:text-base">
				<caption class="text-xl font-bold pt-8">Order details</caption>
				<tbody>
				    <tr class="bg-gray-100">
				      <td class="w-1/3 lg:w-1/4 border font-bold px-4 py-2">Id</td>
				      <td class="w-2/3 lg:w-3/4 border px-4 py-2">{{ $order->id }}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">First Name</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->first_name }}</td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">Last Name</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->last_name }}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Email</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->email }}</td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">Phone</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->phone }}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Postal Code</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->postal_code }}</td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">City</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->city}}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Address</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->address }}</td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">Note</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->note }}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Type Of Payment</td>
				      <td class="w-3/4 border px-4 py-2">
				      	@if($order->type_of_payment == 'card')
				      		Credit Card
				      	@elseif($order->type_of_payment == 'delivery')
				      		On Delivery
				      	@endif
				      </td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">Payment</td>
				      
				      	@if($order->payment)
				      		<td class="w-3/4 bg-green-600 text-white border px-4 py-2">Finished</td>
				      	@else
				      		<td class="w-3/4 bg-yellow-500 border px-4 py-2">Waiting</td>
				      	@endif
				      </td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Status</td>
				      	@switch($order->status)
				      		@case(0)
				      			<td class="w-3/4 bg-red-600 text-white border px-4 py-2">
				      				Canceled
				      			</td>
				      		@break
				      		@case(1)
				      			<td class="w-3/4 bg-yellow-500 border px-4 py-2">
				      				Waiting
				      			</td>
				      		@break
				      		@case(2)
				      			<td class="w-3/4 bg-blue-600 text-white border px-4 py-2">
				      				Sent
				      			</td>
				      		@break
				      		@case(3)
				      			<td class="w-3/4 bg-green-600 text-white border px-4 py-2">
				      				Finished
				      			</td>
				      		@break
				      	@endswitch
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">Created At</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->created_at }}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Updated At</td>
				      <td class="w-3/4 border px-4 py-2">{{ $order->updated_at }}</td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2">Sum</td>
				      <td class="w-3/4 border px-4 py-2">$ {{ $order->sum }}</td>
				    </tr>
				    <tr class="bg-gray-200">
				      <td class="w-1/4 border font-bold px-4 py-2">Shipping</td>
				      <td class="w-3/4 border px-4 py-2">$ {{ $order->shipping }}</td>
				    </tr>
				    <tr class="bg-gray-100">
				      <td class="w-1/4 border font-bold px-4 py-2 ">Total</td>
				      <td class="w-3/4 border px-4 py-2 font-bold underline">$ {{ $order->total }}</td>
				    </tr>
				</tbody>
			</table>

			@if(auth()->user()->email == "admin@example.com")
				<div class="flex flex-col lg:flex-row justify-between items-center py-4">
					<ul class="flex w-full lg:w-2/3 items-center font-semibold my-4">
						<li class="text-base lg:text-lg mx-2">
							<p>Change status to: </p>
						</li>
						<li class="mx-2">
							<form class="flex justify-center" method="POST" action="/admin/order/{{ $order->id }}/status">
								@method('PUT')
								@csrf
								<select class="w-full text-sm md:text-base border b-gray-400 py-2 pl-4" name="status">
									<option value="1">Waiting</option>
									<option value="2">Sent</option>
									<option value="3">Finished</option>
									<option value="0">Canceled</option>
								</select>

								<button class="button text-white text-sm rounded-lg bg-blue-600 hover:bg-blue-700 px-6 py-2 mx-2" type="submit">Change</button>
							</form>
						</li>
					</ul>
					<div class="flex">
						<a class="button text-white text-sm rounded-lg bg-yellow-600 hover:bg-yellow-700 px-6 py-2 mx-2" href="/admin/order/{{ $order->id }}/edit"><i class="fas fa-edit"></i> Edit</a>
						<form class="flex items-center" method="POST" action="/admin/order/{{ $order->id }}/delete">
							@method('DELETE')
							@csrf
							<button class="button text-white text-sm rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
						</form>
					</div>
				</div>
			@else
				@if($order->status == 1)
					<form class="flex justify-end" method="POST" action="/order/{{ $order->id }}/cancel">
						@csrf
						<button class="button text-white text-sm rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2 mt-4 mr-2" type="submit">Cancel Order</button>
					</form>
				@endif
			@endif
		</div>
	</div>
</x-user>