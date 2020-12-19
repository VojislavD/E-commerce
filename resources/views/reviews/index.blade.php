<x-user>
    <div class="container mx-auto">
            @if (session('reviewStatus'))
                <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                    <p>{{ session('reviewStatus') }}</p>
                </div>
            @endif
            @if (session('reviewDeleted'))
                <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                    <p>{{ session('reviewDeleted') }}</p>
                </div>
            @endif
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Reviews</h1>

        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <form class="flex w-full lg:w-1/2 mx-auto flex justify-end items-center" method="GET" action="/admin/reviews/search">
                <input 
                    class="w-full p-1 border-solid border-2 border-gray-400 rounded-lg pl-4 focus:outline-none" 
                    type="text" 
                    name="keyword" 
                    placeholder="Search review by name"
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
            <form class="flex justify-center lg:justify-end text-sm md:text-base px-2 mt-4" method="GET" action="/admin/reviews/filter">
                <label class="font-semibold" for="select"><i class="fas fa-filter"></i> Filter: </label>
                <select class="mx-2 border border-gray-400 px-2" name="status" onchange="this.form.submit()">
                    <option selected>Choose</option>
                    <option value="all">All</option>
                    <option value="2">Waiting for approval</option>
                    <option value="1">Approved</option>
                    <option value="0">Disapproved</option>
                </select>
            </form>
            <table class="w-full table-auto text-sm md:text-base">
                <caption class="text-center text-xl font-bold mt-6">Latest Reviews</caption>
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
                                    <a class="hover:text-orange-600" href="/admin/reviews/{{ $review->id }}">{{ substr($review->comment, 0, 40)}}...</a>
                                </td>
                                <td class="hidden lg:table-cell w-1/6 text-center border border-gray-400 px-4 py-2">
                                    <a class="hover:text-orange-600" href="/admin/reviews/{{ $review->id }}">{{ $review->created_at }}</a>
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
            {{ $reviews->appends(request()->except('page'))->links() }}
        </div>
    </div>
</x-user>