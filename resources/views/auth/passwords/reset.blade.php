<x-user>
    <div class="w-3/4 md:w-1/2 xl:w-1/3 mx-auto">
        <h1 class="text-center text-lg bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Reset password</h1>

        <form class="flex-col py-12 bg-white border border-orange-600 rounded-b-lg" method="POST" action="{{ route('password.update') }}">
            @csrf
            
            <input type="hidden" name="token" value="{{ $token }}">
            
            <table class="w-full table-auto">
                <tbody>
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
                                value="{{ $email ?? old('email') }}"
                                autocomplete="email" 
                                autofocus
                                required
                            >
                            @error('email')
                                <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('email') }}</p>
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
                                value="{{ $password ?? old('password') }}"
                                autocomplete="password"
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
                            <button class="text-white text-sm md:text-base rounded-lg bg-orange-600 hover:bg-orange-700 py-2 px-6" type="submit">Reset Password</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-user>
