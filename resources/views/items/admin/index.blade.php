<x-user>
    <div class="container mx-auto">
        @if (session('itemDeleted'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('itemDeleted') }}</p>
            </div>
        @endif
        @if (session('itemCreated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('itemCreated') }}</p>
            </div>
        @endif
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Items</h1>

        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <div class="flex justify-center lg:justify-start mb-6 lg:mb-0">
                <a class="text-white text-sm px-4 py-2 lg:absolute bg-blue-600 hover:bg-blue-700 rounded-lg" href="/admin/items/create"><i class="fas fa-plus-circle"></i> Create New Item</a>
            </div>

            <form class="flex lg:w-1/2 mx-auto flex justify-end items-center" method="GET" action="/admin/items/search">
                <input 
                    class="w-full p-1 border-solid border-2 border-gray-400 rounded-lg pl-4 focus:outline-none" 
                    type="text" 
                    name="keyword" 
                    placeholder="Search items by name"
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

            <form class="flex justify-center lg:justify-end text-sm md:text-base px-2 mt-4" method="GET" action="/admin/items/filter">
                <label class="font-semibold" for="select"><i class="fas fa-filter"></i> Filter: </label>
                <select class="mx-2 border border-gray-400 px-2" name="category" onchange="this.form.submit()">
                    <option selected>Choose</option>
                    <option value="all">All</option>
                    <option value="1">Trousers</option>
                    <option value="2">Sweatpant</option>
                    <option value="3">Dresses</option>
                    <option value="4">Skirts</option>
                    <option value="5">T-Shirts</option>
                    <option value="6">Shirts</option>
                    <option value="7">Sweaters</option>
                    <option value="8">Jackets</option>
                    <option value="9">Sneakers</option>
                    <option value="10">Shoes</option>
                    <option value="11">Boots</option>
                    <option value="12">Handbags</option>
                </select>
            </form>

            <table class="w-full table-auto">
                <caption class="text-center text-xl font-bold mt-6">Latest Items</caption>
                <thead>
                    <th class="hidden lg:table-cell py-4">Id</th>
                    <th class="hidden lg:table-cell py-4">Category</th>
                    <th class="hidden lg:table-cell py-4">Name</th>
                    <th class="py-4">Code</th>
                    <th class="py-4">Price</th>
                    <th class="hidden lg:table-cell py-4">Rate</th>
                    <th class="py-4">Stock</th>
                    <th class="py-4">Image</th>
                    <th class="py-4">Edit</th>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr class="bg-gray-200 @if($item->stock === 0) bg-red-600 text-white @endif">
                            <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    {{ $item->id }}
                                </a>
                            </td>
                            <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/category/{{ $item->category->name }}">
                                    {{ $item->category->name }}
                                </a>
                            </td>
                            <td class="hidden lg:table-cell w-2/6 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    {{ substr($item->name, 0,50) }}...
                                </a>
                            </td>
                            <td class="w-2/6 lg:w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    {{ $item->code }}
                                </a>
                            </td>
                            <td class="w-2/6 lg:w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    ${{ $item->price }}
                                </a>
                            </td>
                            <td class="hidden lg:table-cell w-1/12 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    {{ $item->rate }}
                                </a>
                            </td>
                            <td class="w-1/6 lg:w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2 @if($item->stock === 0) bg-red-600 text-white @endif">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    {{ $item->stock }}
                                </a>
                            </td>
                            <td class="w-2/6 lg:w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600" href="/admin/items/{{ $item->id }}">
                                    <img class="w-8 mx-auto" src="{{ asset($item->image_url) }}">
                                </a>
                            </td>
                            <td class="w-1/12 text-center border border-gray-400 px-1 lg:px-4 py-2">
                                <a class="hover:text-orange-600 px-6 py-2" href="/admin/items/{{ $item->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
            {{ $items->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-user>