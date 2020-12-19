<x-user>
    <div class="w-3/4 md:w-1/2 xl:w-1/3 mx-auto">
        @if (session('userDeleted'))
            <div class="text-center mb-4 bg-green-400 py-2 rounded-lg">
                {{ session('userDeleted') }}
            </div>
        @endif
        <h1 class="text-center text-base md:text-lg bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Sign in</h1>
        <form class="flex-col py-6 bg-white border border-orange-600 rounded-b-lg" method="POST" action="{{ route('login') }}">
            @csrf

            <table class="w-full table-auto">
                <tbody>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-2/3" for="email">E-mail</label>
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
                        <td class="w-full text-sm md:text-base p-1 px-4 flex items-center justify-end">
                            <label class="w-2/3" for="password">Password</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-4">
                            <input 
                                class="w-full text-sm md:text-base p-1 border border-gray-400 @error('password') border-red-600 @enderror" 
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
                        <td class="w-1/3"></td>
                        <td class="w-2/3 pr-4 pb-6">
                            <input class="mr-2" type="checkbox" name="remember_me" id="remember_me">
                            <label for="remember_me">Remember me</label>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-1/3"></td>
                        <td class="w-2/3 pr-4 pb-2">
                            <button class="text-white text-sm md:text-base rounded-lg bg-orange-600 hover:bg-orange-700 py-2 px-6" type="submit">Sign in</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-1/3"></td>
                        <td class="w-2/3 pr-4">
                            @if (Route::has('password.request'))
                                <a class="text-orange-600 hover:text-orange-700 text-sm md:text-base" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-user>