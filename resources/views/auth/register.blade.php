<x-user>
    <div class="w-3/4 md:w-1/2 xl:w-1/3 mx-auto">
        <h1 class="text-center text-base md:text-lg bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Sign up</h1>
        
        <form class="flex-col py-6 bg-white border border-orange-600 rounded-b-lg" method="POST" action="{{ route('register') }}">
            @csrf

            <table class="w-full table-auto">
                <tbody>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="name">Name</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('name') border-red-600 @enderror" 
                                type="text" 
                                name="name" 
                                id="name"
                                value="{{ old('name') }}"
                                required
                                autofocus 
                            >
                            @error('name')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('name') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="first_name">First Name</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('first_name') border-red-600 @enderror" 
                                type="text" 
                                name="first_name" 
                                id="first_name"
                                value="{{ old('first_name') }}"
                                required
                            >
                            @error('first_name')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('first_name') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="first_name">Last Name</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('last_name') border-red-600 @enderror" 
                                type="text" 
                                name="last_name" 
                                id="last_name"
                                value="{{ old('last_name') }}"
                                required
                            >
                            @error('last_name')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('last_name') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="email">E-mail</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('email') border-red-600 @enderror" 
                                type="email" 
                                name="email" 
                                id="email"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('email') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="phone">Phone</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('phone') border-red-600 @enderror" 
                                type="text" 
                                name="phone" 
                                id="phone"
                                value="{{ old('phone') }}"
                                required
                            >
                            @error('phone')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('phone') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="postal_code">Postal Code</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('postal_code') border-red-600 @enderror" 
                                type="text" 
                                name="postal_code" 
                                id="postal_code"
                                value="{{ old('postal_code') }}"
                                required
                            >
                            @error('postal_code')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('postal_code') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="city">City</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('city') border-red-600 @enderror" 
                                type="text" 
                                name="city" 
                                id="city"
                                value="{{ old('city') }}"
                                required
                            >
                            @error('city')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('city') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="address">Address</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('address') border-red-600 @enderror" 
                                type="text" 
                                name="address" 
                                id="address"
                                value="{{ old('address') }}"
                                required
                            >
                            @error('address')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('address') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="password">Password</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('password') border-red-600 @enderror" 
                                type="password" 
                                name="password" 
                                id="password"
                                required
                            >
                            @error('password')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('password') }}</p>
                            @enderror
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full" for="password_confirmation">Confirm Password</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full p-1 border border-gray-400" 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation"
                                required
                            >
                        </td>
                    </tr>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end"></td>
                        <td class="w-2/3 pr-4 pb-4">
                            <button class="button text-white text-sm rounded-lg bg-orange-600 hover:bg-orange-700 px-4 py-2" type="submit">Sign up</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-user>