<x-user>
    <div class="container mx-auto">
        <h1 class="text-center text-lg md:text-xl mx-4 px-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">New Item </h1>

        <div class="flex-col py-6 mx-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
            <form method="POST" action="/admin/items/create" enctype="multipart/form-data">
                @csrf
                <table class="w-full table-auto text-sm md:text-base">
                    <caption class="text-xl font-bold px-4 py-4">Create New Item</caption>
                    <tbody>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Category
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <select 
                                    class="border border-gray-400 p-2 @error('category_id') border-red-600 @enderror" 
                                    name="category_id"
                                >
                                    <option value="1">Trousers</option>
                                    <option value="2">Sweatpants</option>
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
                                    value="{{ old('name') }}"
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
                                    value="{{ old('code') }}"
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
                                    value="{{ old('price') }}"
                                    required
                                >
                                @error('price')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('price') }}</p>
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
                                    value="{{ old('stock') }}"
                                    required
                                >
                                @error('stock')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('stock') }}</p>
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
                                >{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('description') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Tags
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                @for ($i = 0; $i < 5; $i++)
                                    <input 
                                        class="w-1/6 border border-gray-400 p-2 @error('tags') border-red-600 @enderror" 
                                        type="text"
                                        name="tags[]"
                                        placeholder="Tag {{ $i+1 }}"
                                    >
                                @endfor
                                <p class="underline mt-2">*Maximum number of tags is 5</p>
                                @error('tag_name.*')
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('tag_name.*') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td class="w-1/6 text-center font-bold px-4 py-2">
                                Image
                            </td>
                            <td class="w-5/6 px-4 py-2">
                                <img class="w-32" src="">
                                <input 
                                    class="@error('image_url') text-red-600 @enderror" 
                                    class="" 
                                    type="file" 
                                    name="image" 
                                    required
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
                                <button class="text-white text-sm px-6 py-2 mx-1 bg-green-600 hover:bg-green-700 rounded-lg" type="submit"><i class="fas fa-save"></i> Save</button>
                    
                                <a class="text-white text-sm rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2 mx-1" href="{{ url()->previous() }}"><i class="fas fa-ban"></i> Cancel</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                
                
            </form>
        </div>
    </div>
</x-user>