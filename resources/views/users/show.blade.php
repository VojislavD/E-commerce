<x-user>
    <div class="container mx-auto">
        @if (session('userUpdated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('userUpdated') }}</p>
            </div>
        @endif
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">User: {{ $user->first_name }} {{ $user->last_name }}</h1>

        <div class="flex flex-col lg:flex-row py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <table class="w-full lg:w-1/2 table-auto mt-2 mb-6">
                <caption class="text-xl text-center px-4 py-4 font-bold">User Informations</caption>
                <tbody >
                    <tr class="bg-gray-200">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Name
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            First Name
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->first_name }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Last Name
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->last_name }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Email
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Phone
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Postal Code
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->postal_code }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            City
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->city }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Address
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->address }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/2 text-center font-bold border border-gray-400 px-4 py-2">
                            Created At
                        </td>
                        <td class="w-1/2 text-center border border-gray-400 px-4 py-2">
                            {{ $user->created_at->toFormattedDateString() }}
                        </td>
                    </tr>
                    <tr>
                        <td class="w-1/2"></td>
                        <td class="w-1/2 text-right px-2 py-8">
                            <a class="button text-white text-sm px-4 py-3 bg-yellow-600 hover:bg-yellow-700 rounded-lg" href="/user/{{ $user->name }}/edit"><i class="fas fa-edit"></i> Edit Account</a>
                        </td>
                    </tr>
                </tbody>
            </table>


            <table class="w-full lg:w-1/2 lg:ml-4 table-auto">
                <caption class="text-center text-xl font-bold mt-6">Last Orderds</caption>
                <thead>
                    <th class="px-4 py-4">Order Date</th>
                    <th class="px-4 py-4">Status</th>
                </thead>
                <tbody >
                    @forelse($user->orders as $order)
                        <tr class="bg-gray-200">
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/order/{{ $order->id }}">{{ $order->created_at }} </a>
                            </td>
                            @switch($order->status)
                                @case(0)
                                    <td class="w-1/3 bg-red-600 text-center text-sm text-white border border-gray-400 px-4 py-2">
                                        Canceled
                                    </td>
                                @break
                                @case(1)
                                    <td class="w-1/3 bg-yellow-500 text-center text-sm border border-gray-400 px-4 py-2">
                                        Waiting
                                    </td>
                                @break
                                @case(2)
                                    <td class="w-1/3 bg-blue-500 text-center text-sm text-white border border-gray-400 px-4 py-2">
                                        Sent
                                    </td>
                                @break
                                @case(3)
                                    <td class="w-1/3 bg-green-500 text-center text-sm text-white border border-gray-400 px-4 py-2">
                                        Finished
                                    </td>
                                @break
                            @endswitch
                        </tr>
                    @empty
                        <tr class="bg-gray-200">
                            <td colspan="2" class="w-full text-center border border-gray-400 px-4 py-2">
                                No orders
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-user>