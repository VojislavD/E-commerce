<x-user>
    <div class="w-3/4 md:w-1/2 xl:w-1/3 mx-auto">
        <h1 class="text-center my-0 text-base md:text-lg bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Confirm password</h1>
        
        <div class="py-6 bg-white border border-orange-600 rounded-b-lg">
            <p class="text-sm md:text-base ml-4 mb-6">Please confirm your password before continuing.</p>
            <form class="flex-col justify-center" method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <table class="w-full table-auto">
                    <tbody>
                        <tr class="text-sm md:text-base">
                            <td class="w-full p-1 px-4 flex items-center justify-end">
                                <label class="w-full text-right" for="password">Password</label>
                            </td>
                            <td class="w-2/3 pr-4 pb-8">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('password') border-red-600 @enderror" 
                                    type="password" 
                                    name="password" 
                                    id="password"
                                    value="{{ old('password') }}"
                                    autocomplete="password" 
                                    autofocus
                                    required
                                >
                                @error('password')
                                    <p class="text-red-600 text-xs md:text-sm font-semibold">{{ $errors->first('password') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr class="text-sm md:text-base">
                            <td class="w-full p-1 px-4 flex items-center justify-end"></td>
                            <td class="w-2/3 pr-4 pb-4">
                                <button class="text-white text-sm md:text-base rounded-lg bg-orange-600 hover:bg-orange-700 py-2 px-4 md:px-6" type="submit">Confirm Password</button>
                            </td>
                        </tr>
                        @if (Route::has('password.request'))
                            <tr class="text-sm md:text-base">
                                <td class="w-full p-1 px-4 flex items-center justify-end"></td>
                                <td class="w-2/3 pr-4">
                                    <a class="text-orange-600 text-sm" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</x-user>