<x-user>
    <div class="container mx-auto">
        <h1 class="text-center text-lg md:text-xl mx-4 px-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Item: {{ $item->name }}</h1>

        <div class="flex-col py-6 mx-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <form method="POST" action="/admin/items/{{ $item->id }}/update" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <table class="w-full table-auto text-sm md:text-base">
                    <caption class="text-xl font-bold px-4 py-4">Edit Item</caption>
                    <tbody >
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Category
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <select 
                                    class="border border-gray-400 p-2 @error('category_id') border-red-600 @enderror" 
                                    name="category_id"
                                    required
                                >
                                    <option 
                                        @if($item->category->name === 'Trousers') selected @endif
                                        value="1" 
                                    >
                                        Trousers
                                    </option>
                                    <option
                                        @if($item->category->name === 'Sweatpants') selected @endif
                                        value="2"
                                    >
                                        Sweatpants
                                    </option>
                                    <option
                                        @if($item->category->name === 'Dresses') selected @endif
                                        value="3"
                                    >
                                        Dresses
                                    </option>
                                    <option
                                        @if($item->category->name === 'Skirts') selected @endif
                                        value="4"
                                    >
                                        Skirts
                                    </option>
                                    <option
                                        @if($item->category->name === 'T-Shirts') selected @endif
                                        value="5"
                                    >
                                        T-Shirts
                                    </option>
                                    <option
                                        @if($item->category->name === 'Shirts') selected @endif
                                        value="6"
                                    >
                                        Shirts
                                    </option>
                                    <option
                                        @if($item->category->name === 'Sweaters') selected @endif
                                        value="7"
                                    >
                                        Sweaters
                                    </option>
                                    <option
                                        @if($item->category->name === 'Jackets') selected @endif
                                        value="8"
                                    >
                                        Jackets
                                    </option>
                                    <option
                                        @if($item->category->name === 'Sneakers') selected @endif
                                        value="9"
                                    >
                                        Sneakers
                                    </option>
                                    <option
                                        @if($item->category->name === 'Shoes') selected @endif
                                        value="10"
                                    >
                                        Shoes
                                    </option>
                                    <option
                                        @if($item->category->name === 'Boots') selected @endif
                                        value="11"
                                    >
                                        Boots
                                    </option>
                                    <option
                                        @if($item->category->name === 'Handbags') selected @endif
                                        value="12"
                                    >
                                        Handbags
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Name
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <input 
                                    class="w-full border border-gray-400 p-2 @error('name') border-red-600 @enderror" 
                                    type="text" 
                                    name="name" 
                                    value="{{ $item->name ?? old('name') }}"
                                    required
                                >
                                @error('name')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('name') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Code
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <input 
                                    class="w-full border border-gray-400 p-2 @error('code') border-red-600 @enderror" 
                                    type="number" 
                                    name="code" 
                                    value="{{ $item->code }}"
                                    required
                                >
                                @error('code')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('code') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Price
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <input 
                                    class="w-full border border-gray-400 p-2 @error('price') border-red-600 @enderror" 
                                    type="number"
                                    step="0.01" 
                                    name="price"
                                    value="{{ $item->price }}"
                                    required
                                >
                                @error('price')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('price') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Description
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <textarea 
                                    class="w-full border border-gray-400 p-2 @error('description') border-red-600 @enderror" 
                                    rows="4" 
                                    name="description"
                                    required
                                >{{ $item->description }}</textarea>
                                @error('description')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('description') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Rate
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <select 
                                    class="border border-gray-400 p-2 @error('rate') border-red-600 @enderror" 
                                    name="rate"
                                    required
                                >
                                    <option @if($item->rate === 1) selected @endif>1</option>
                                    <option @if($item->rate === 2) selected @endif>2</option>
                                    <option @if($item->rate === 3) selected @endif>3</option>
                                    <option @if($item->rate === 4) selected @endif>4</option>
                                    <option @if($item->rate === 5) selected @endif>5</option>
                                </select>
                                @error('rate')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('rate') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Stock
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <input 
                                    class="w-full border border-gray-400 p-2 @error('stock') border-red-600 @enderror" 
                                    type="number"
                                    step="1"
                                    min="0"
                                    name="stock"
                                    value="{{ $item->stock }}"
                                    required
                                >
                                @error('stock')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('stock') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Created At
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <input 
                                    class="w-full border border-gray-400 p-2 @error('created_at') border-red-600 @enderror" 
                                    class="w-full border border-gray-400 p-2 " 
                                    type="date" 
                                    name="created_at" 
                                    value="{{ $item->created_at->isoFormat('YYYY-MM-DD') }}"
                                    required
                                >
                                @error('created_at')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('created_at') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Image
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <img class="w-32" src="{{ asset($item->image_url) }}">
                                <input 
                                    class="@error('image_url') text-red-600 @enderror" 
                                    class="" 
                                    type="file" 
                                    name="image" 
                                >
                                <p class="underline mt-2">*Image dimensions must be 400x600px</p>
                                @error('image')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('image') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2"></td>
                            <td class="w-5/6 text-right px-4 py-4">
                                <button class="text-white text-sm px-6 py-2 mx-1 bg-green-600 hover:bg-green-700 rounded-lg" type="submit"><i class="fas fa-save"></i> Update</button>
                    
                                <a class="text-white text-sm rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2 mx-1" href="{{ url()->previous() }}"><i class="fas fa-ban"></i> Cancel</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</x-user>