<x-user>
	<div class="container mx-auto">
        <h1 class="text-center text-lg md:text-xl mx-4 lg:mx-auto bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Change User Informations</h1>
        <div class="flex-col py-6 mx-4 px-4 lg:mx-auto text-sm md:text-base bg-white border border-orange-600 rounded-b-lg">
    		<form method="POST" action="/user/{{ $user->name }}/update">
                @method('PUT')
                @csrf

                <table class="w-full lg:w-2/3 mx-auto table-auto">
                    <tbody >
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="name">Name</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('name') border-red-600 @enderror" 
                                    type="text" 
                                    name="name" 
                                    id="name"
                                    value="{{ $user->name }}"
                                    required 
                                    autofocus 
                                >
                                @error('name')
                                    <p class="text-red-600 text-sm text-left font-semibold">{{ $errors->first('name') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="first_name">First Name</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('first_name') border-red-600 @enderror" 
                                    type="text" 
                                    name="first_name" 
                                    id="first_name"
                                    value="{{ $user->first_name }}"
                                    required
                                >
                                @error('first_name')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('first_name') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="last_name">Last Name</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('last_name') border-red-600 @enderror" 
                                    type="text" 
                                    name="last_name" 
                                    id="last_name"
                                    value="{{ $user->last_name }}"
                                    required
                                >
                                @error('last_name')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('last_name') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="email">E-mail</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('email') border-red-600 @enderror" 
                                    type="email" 
                                    name="email" 
                                    id="email"
                                    value="{{ $user->email }}"
                                    required
                                >
                                @error('email')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('email') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="phone">Phone</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('phone') border-red-600 @enderror" 
                                    type="text" 
                                    name="phone" 
                                    id="phone"
                                    value="{{ $user->phone }}"
                                    required
                                >
                                @error('phone')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('phone') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="postal_code">Postal Code</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('postal_code') border-red-600 @enderror" 
                                    type="text" 
                                    name="postal_code" 
                                    id="postal_code"
                                    value="{{ $user->postal_code }}"
                                    required
                                >
                                @error('postal_code')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('postal_code') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="city">City</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('city') border-red-600 @enderror" 
                                    type="text" 
                                    name="city" 
                                    id="city"
                                    value="{{ $user->city }}"
                                    required
                                >
                                @error('city')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('city') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="address">Address</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('address') border-red-600 @enderror" 
                                    type="text" 
                                    name="address" 
                                    id="address"
                                    value="{{ $user->address }}"
                                    required
                                >
                                @error('address')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('address') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center font-bold px-4 py-2">
                                <label for="password">Password</label>
                            </td>
                            <td class="w-2/3 text-center px-4 py-2">
                                <input 
                                    class="w-full p-1 border border-gray-400 @error('password') border-red-600 @enderror" 
                                    type="password" 
                                    name="password" 
                                    id="password"
                                    value="{{ $user->password }}"
                                    required 
                                >
                                @error('password')
                                    <p class="text-red-600 text-sm c font-semibold">{{ $errors->first('password') }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-center px-4 py-2"></td>
                            <td class="w-2/3 text-right px-4 py-2">
                                <button class="button text-white text-sm rounded-lg bg-green-600 hover:bg-green-700 px-6 py-2" type="submit"><i class="fas fa-save"></i> Update</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
    		</form>
            <form class="w-full lg:w-2/3 mx-auto text-right pr-4" method="POST" action="/user/{{ $user->name }}/delete">
                @csrf 
                @method('DELETE')
                <button class="button text-white text-sm rounded-lg bg-red-600 hover:bg-red-700 px-6 py-2"><i class="fas fa-trash-alt"></i> Delete Account</button>
            </form>
        </div>
	</div>
</x-user>