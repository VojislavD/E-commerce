<x-user>
    <div class="container mx-auto">
        @if (session('itemUpdated'))
            <div class="md:w-1/2 mx-4 md:mx-auto text-center mb-2 bg-green-500 text-white py-2 rounded-lg">
                <p>{{ session('itemUpdated') }}</p>
            </div>
        @endif
        <h1 class="text-center text-lg md:text-xl mx-4 px-2 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Item: {{ $item->name }}</h1>

        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <table class="w-full table-auto mt-2 mb-6">
                <thead>
                    <th colspan="2" class="text-xl px-4 py-4">Item Informations</th>
                </thead>
                <tbody >
                    <tr class="bg-gray-200">
                        <td class="w-1/6 text-center font-bold border border-gray-400 px-4 py-2">
                            ID
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->id }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Category
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->category->name }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Name
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->name }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Code
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->code }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Price
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            $ {{ $item->price }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Description
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->description }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Rate
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->rate }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Stock
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2 @if($item->stock === 0) bg-red-600 text-white @endif">
                            {{ $item->stock }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Created At
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->created_at->toFormattedDateString() }}
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Updated At
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            {{ $item->updated_at->toFormattedDateString() }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Image
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            <img class="w-32" src="{{ asset($item->image_url) }}">
                        </td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="w-1/6 text-center font-bold  border border-gray-400 px-4 py-2">
                            Tags
                        </td>
                        <td class="w-5/6 border border-gray-400 px-4 py-2">
                            @forelse($item->tags as $tag)
                                <a class="hover:text-orange-600" href="/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                            @empty
                                <p>There is no tags for this item.<p>
                            @endforelse
                        </td>
                    </tr>
                    <tr>
                        <td class="w-1/6 text-center font-bold px-4 py-2"></td>
                        <td class="w-full flex justify-end px-2 py-6">
                            <a class="text-white text-sm mx-1 px-6 py-2 bg-yellow-600 hover:bg-yellow-700 rounded-lg" href="/admin/items/{{ $item->id }}/edit"><i class="fas fa-edit"></i> Edit</a>

                            <form method="POST" action="/admin/items/{{ $item->id }}/delete">
                                @method('DELETE')
                                @csrf
                                <button class="text-white text-sm mx-1 rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-user>