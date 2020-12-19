<x-user>
    <div class="container mx-auto">
        <h1 class="text-center text-lg md:text-xl bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Admin Dashboard</h1>

        <div class="flex-col pt-6 pb-12 bg-white border border-orange-600 rounded-b-lg">
            
            <div class="flex-col items-center justify-center px-8 mb-12">            
                <p class="w-full text-center text-base md:text-xl font-bold">Last 10 Orders</p>
                <table class="w-full text-sm md:text-base table-auto">
                    <thead>
                        <th class="py-4">User</th>
                        <th class="hidden lg:table-cell py-4">Created At</th>
                        <th class="hidden lg:table-cell py-4">Sum</th>
                        <th class="hidden lg:table-cell py-4">Shipping</th>
                        <th class="py-4">Total</th>
                        <th class="py-4">Status</th>
                        <th class="py-4">Edit</th>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr class="bg-gray-200">
                                <td class="w-2/6 lg:w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    @empty($order->user)
                                        <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                                    @else
                                        <a class="hover:text-orange-600" href="/admin/user/{{ $order->user->name }}">
                                            {{ $order->user->first_name }} {{ $order->user->last_name }}
                                        </a>
                                    @endif
                                </td>
                                <td class="hidden lg:table-cell w-1/6 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600" href="/order/{{ $order->id }}">{{ $order->created_at }}</a>
                                </td>
                                <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600" href="/order/{{ $order->id }}">${{ $order->sum }}</a>
                                </td>
                                <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600" href="/order/{{ $order->id }}">${{ $order->shipping }}</a>
                                </td>
                                <td class="w-1/6 lg:w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <a class="hover:text-orange-600" href="/order/{{ $order->id }}">${{ $order->total }}</a>
                                </td>
                                @switch($order->status)
                                    @case(0)
                                        <td class="w-1/6 bg-red-600 text-center text-white border border-gray-400 px-1 lg:px-4 py-2">
                                            Canceled
                                        </td>
                                    @break
                                    @case(1)
                                        <td class="w-1/6 bg-yellow-500 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                            Waiting
                                        </td>
                                    @break
                                    @case(2)
                                        <td class="w-1/6 bg-blue-600 text-center text-white border border-gray-400 px-1 lg:px-4 py-2">
                                            Sent
                                        </td>
                                    @break
                                    @case(3)
                                        <td class="w-1/6 bg-green-600 text-center text-white border border-gray-400 px-1 lg:px-4 py-2">
                                            Finished
                                        </td>
                                    @break
                                @endswitch
                                <td class="w-1/12 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600 px-1 lg:px-6 py-2" href="/admin/order/{{ $order->id }}/edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-200">
                                <td colspan="6" class="w-full text-center border border-gray-400 px-4 py-2">
                                    <p>No orders</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex-col items-center justify-center px-8 mb-12">            
                <p class="w-full text-center text-base md:text-xl font-bold">Last 10 Reviews</p>
                <table class="w-full text-sm md:text-base table-auto">
                    <thead>
                        <th class="py-4">Item</th>
                        <th class="py-4">Name</th>
                        <th class="py-4">Comment</th>
                        <th class="hidden lg:table-cell py-4">Created At</th>
                        <th class="py-4">Status</th>
                    </thead>
                    <tbody >
                        @forelse($reviews as $review)
                            <tr class="bg-gray-200">
                                <td class="w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <a class="hover:text-orange-600" href="/items/{{ $review->item->id }}">{{ substr($review->item->name, 0,15)}}...</a>
                                </td>
                                <td class="w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <a class="hover:text-orange-600" href="/admin/reviews/{{ $review->id }}">{{ substr($review->name,0,20)}}...</a>
                                </td>
                                <td class="w-2/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <a class="hover:text-orange-600" href="/reviews/{{ $review->id }}">{{ substr($review->comment, 0, 40)}}...</a>
                                </td>
                                <td class="hidden lg:table-cell w-1/6 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600" href="/reviews/{{ $review->id }}">{{ $review->created_at }}</a>
                                </td>
                                @switch($review->status)
                                    @case(0)
                                        <td class="w-1/6 bg-red-600 text-center text-white border border-gray-400 px-1 lg:px-4 py-1">
                                            Not Approved
                                        </td>
                                    @break
                                    @case(1)
                                        <td class="w-1/6 bg-green-600 text-center text-white border border-gray-400 px-1 lg:px-4 py-1">
                                            Approved
                                        </td>
                                    @break
                                    @case(2)
                                        <td class="w-1/6 bg-yellow-500 text-center border border-gray-400 px-1 lg:px-4 py-1">
                                        Waiting for approval
                                    </td>
                                    @break
                                @endswitch
                            </tr>
                        @empty
                            <tr class="bg-gray-200">
                                <td colspan="6" class="w-full text-center border border-gray-400 px-4 py-2">
                                    <p>No reviews</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex-col items-center justify-center px-8 mb-12">            
                <p class="w-full text-center text-base md:text-xl font-bold">Last 10 Users</p>
                <table class="w-full text-sm md:text-base table-auto">
                    <thead>
                        <th class="py-4">Name</th>
                        <th class="hidden lg:table-cell py-4">Email</th>
                        <th class="py-4">Created At</th>
                        <th class="py-4">Number Of Orders</th>
                        <th class="py-4">Last Order</th>
                        <th class="py-4">Edit</th>
                    </thead>
                    <tbody >
                        @forelse($users as $user)
                            <tr class="bg-gray-200">
                                <td class="w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <a class="hover:text-orange-600" href="/admin/user/{{ $user->name }}">{{ $user->first_name }} {{ $user->last_name}}</a>
                                </td>
                                <td class="hidden lg:table-cell w-1/6 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600" href="/admin/user/{{ $user->name }}">{{ $user->email }}</a>
                                </td>
                                <td class="w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <p>{{ $user->created_at->toFormattedDateString() }}</p>
                                </td>
                                <td class="w-1/12 text-center border border-gray-400 px-4 py-2">
                                    <p>{{ $user->orders->count() }}</p>
                                </td>
                                <td class="w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <p>
                                        @if(count($user->orders))
                                            <a class="hover:text-orange-600" href="/order/{{ $user->orders->last()->id }}">
                                                {{ $user->orders->last()->created_at->toFormattedDateString() }}
                                            </a>
                                        @endif
                                    </p>
                                </td>
                                <td class="w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                    <a class="hover:text-orange-600 px-6 py-2" href="/user/{{ $user->name }}/edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-200">
                                <td colspan="6" class="w-full text-center border border-gray-400 px-4 py-2">
                                    <p>No users</p>
                                </td>
                                
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-user>