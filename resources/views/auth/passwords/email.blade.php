<x-user>
    <div class="w-3/4 md:w-1/2 xl:w-1/3 mx-auto">
        @if (session('status'))
            <div class="text-center mb-4 bg-green-400 py-2 rounded-lg">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="text-center text-lg bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Reset password</h1>
        
        <form class="flex-col py-12 bg-white border border-orange-600 rounded-b-lg" method="POST" action="{{ route('password.email') }}">
            @csrf

            <table class="w-full table-auto">
                <tbody>
                    <tr class="text-sm md:text-base">
                        <td class="w-full p-1 px-4 flex items-center justify-end">
                            <label class="w-full text-right" for="email">E-mail</label>
                        </td>
                        <td class="w-2/3 pr-4 pb-8">
                            <input 
                                class="w-full p-1 border border-gray-400 @error('email') border-red-600 @enderror" 
                                type="email" 
                                name="email" 
                                id="email"
                                value="{{ old('email') }}"
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
                        <td class="w-full p-1 px-4 flex items-center justify-end"></td>
                        <td class="w-2/3 pr-4">
                            <button class="text-white text-sm md:text-base rounded-lg bg-orange-600 hover:bg-orange-700 py-2 px-4 md:px-6" type="submit">Send Password Reset Link</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-user>