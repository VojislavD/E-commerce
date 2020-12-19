<x-user>
    <div class="container mx-auto">
        @if (session('userUpdated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('userUpdated') }}</p>
            </div>
        @endif
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Users</h1>

        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <form class="flex lg:w-1/2 mx-auto flex justify-end items-center" method="GET" action="/admin/users/search">
                <input 
                    class="w-full p-1 border-solid border-2 border-gray-400 rounded-lg pl-4 focus:outline-none" 
                    type="text" 
                    name="keyword" 
                    placeholder="Search users by name"
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
            <h1 class="text-center text-base md:text-xl font-bold mt-6">Latest Users</h1>
            <table class="w-full table-auto text-sm md:text-base">
                <thead>
                    <th class="py-4">Name</th>
                    <th class="py-4">Email</th>
                    <th class="hidden lg:table-cell py-4">Created At</th>
                    <th class="hidden lg:table-cell py-4">Number Of Orders</th>
                    <th class="hidden lg:table-cell py-4">Last Order</th>
                    <th class="py-4">Edit</th>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="bg-gray-200">
                            <td class="w-1/3 lg:w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/user/{{ $user->name }}">{{ $user->first_name }} {{ $user->last_name}}</a>
                            </td>
                            <td class="w-1/3 lg:w-1/6 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/user/{{ $user->name }}">{{ $user->email }}</a>
                            </td>
                            <td class="hidden lg:table-cell w-1/6 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/user/{{ $user->name }}">{{ $user->created_at->toFormattedDateString() }}</a>
                            </td>
                            <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                <p>{{ $user->orders->count() }}</p>
                            </td>
                            <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
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
            {{ $users->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-user>