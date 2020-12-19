<x-user>
    <div class="container mx-auto">
        @if (session('orderDeleted'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('orderDeleted') }}</p>
            </div>
        @endif
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Orders</h1>

        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <form class="flex lg:w-1/2 mx-auto flex justify-end items-center" method="GET" action="/admin/orders/search">
                <input 
                    class="w-full p-1 border-solid border-2 border-gray-400 rounded-lg pl-4 focus:outline-none" 
                    type="text" 
                    name="keyword" 
                    placeholder="Search orders by user name"
                    value="{{ request('keyword') }}"
                    required
                >
                <button type="submit" class="outline-none focus:outline-none active:outline-none absolute pr-4">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         viewBox="0 0 24 24" class="w-5 h-5">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
            <form class="flex justify-center lg:justify-end text-sm md:text-base px-2 mt-4" method="GET" action="/admin/orders/filter">
                <label class="font-semibold" for="select"><i class="fas fa-filter"></i> Filter: </label>
                <select class="mx-2 border border-gray-400 px-2" name="status" onchange="this.form.submit()">
                    <option selected>Choose</option>
                    <option value="all">All</option>
                    <option value="1">Waiting</option>
                    <option value="2">Sent</option>
                    <option value="3">Finished</option>
                    <option value="0">Canceled</option>
                </select>
            </form>
            <table class="w-full table-auto text-sm md:text-base">
                <caption class="text-center text-xl font-bold mt-6">Latest Orders</caption>
                <thead>
                    <th class="py-4">User</th>
                    <th class="hidden lg:table-cell py-4">Created At</th>
                    <th class="hidden lg:table-cell py-4">Sum</th>
                    <th class="hidden lg:table-cell py-4">Shipping</th>
                    <th class="py-4">Total</th>
                    <th class="py-4">Status</th>
                    <th class="py-4">Edit</th>
                </thead>
                <tbody >
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
                                <a class="hover:text-orange-600" href="/order/{{ $order->id }}">$ {{ $order->sum }}</a>
                            </td>
                            <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/order/{{ $order->id }}">$ {{ $order->shipping }}</a>
                            </td>
                            <td class="w-1/6 lg:w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600" href="/order/{{ $order->id }}">$ {{ $order->total }}</a>
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
            {{ $orders->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-user>