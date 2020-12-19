<x-user>
    <div class="container mx-auto">
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Reviews</h1>

        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <table class="w-full table-auto">
                <caption class="text-center text-xl font-bold mt-6">Review {{ $review->id }}</caption>
                <tbody >
                    @empty(!$review)
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Item
                            </td>
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                <a class="hover:text-orange-600" href="/items/{{ $review->item->id }}">{{ $review->item->name}}</a>
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Rate
                            </td>
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                {{ $review->rate }}
                            </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Name
                            </td>
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                {{ $review->name }}
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Email
                            </td>
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                {{ $review->email }}
                            </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Comment
                            </td>
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                {{ $review->comment }}
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Created At
                            </td>
                            <td class="w-2/3 text-center border border-gray-400 px-4 py-2">
                                {{ $review->created_at }}
                            </td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="w-1/3 text-center font-bold border border-gray-400 px-4 py-2">
                                Status
                            </td>
                        @switch($review->status)
                            @case(0)
                                <td class="w-2/3 bg-red-600 text-center text-white border border-gray-400 px-4 py-2">
                                    Not Approved
                                </td>
                            @break
                            @case(1)
                                <td class="w-2/3 bg-green-600 text-center text-white border border-gray-400 px-4 py-2">
                                    Approved
                                </td>
                            @break
                            @case(2)
                                <td class="w-2/3 bg-yellow-500 text-center border border-gray-400 px-4 py-2">
                                Waiting for approval
                            </td>
                            @break
                        @endswitch
                        </tr>
                    @else
                        <tr class="bg-gray-200">
                            <td colspan="2" class="w-full text-center border border-gray-400 px-4 py-2">
                                <p>No review</p>
                            </td>
                        </tr>
                    @endempty
                </tbody>
            </table>

            <div class="flex justify-end mt-6 mr-6">
                <form class="mx-2" method="POST" action="/admin/review/{{ $review->id }}/update">
                    @method('PUT')
                    @csrf

                    <label class="mr-2" for="status">Change status to:</label>
                    <select 
                        class="border border-gray-400 px-4 py-1" 
                        id="status" 
                        name="status" 
                        onchange="this.form.submit()"
                        required
                    >
                        <option selected>Choose</option>
                        <option value="approve">Approve</option>
                        <option value="disapprove">Dispprove</option>
                    </select>
                </form>
            </div>
            <div class="flex justify-end mt-6 mr-6">
                <form class="mx-2" method="POST" action="/admin/review/{{ $review->id }}/delete">
                    @method('DELETE')
                    @csrf
                    <button class="bg-red-600 hover:bg-red-700 text-white text-sm py-2 px-4 my-2 rounded" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-user>