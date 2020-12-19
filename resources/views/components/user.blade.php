<x-master>
	<div class="bg-gray-100 min-h-screen">
		<div class="flex items-center w-full min-h-16 border-b-2 border-gray-300">
	        <div class="flex items-center justify-between container mx-auto">
	            <a href="/">
	                <img class="h-20" src="/images/logo.png">
	            </a>
	            @auth
		            @if(auth()->user()->email == "admin@example.com")
			            <ul class="w-1/2 flex justify-start">
			            	<li class="mx-1 md:mx-2">
			            		<a class="btn bg-blue-600 hover:bg-blue-700 text-xs md:text-sm text-white py-2 px-2 md:px-4 rounded" href="/admin/orders">Orders</a>
			            	</li>
			            	<li class="mx-1 md:mx-2">
			            		<a class="btn bg-blue-600 hover:bg-blue-700 text-xs md:text-sm text-white py-2 px-2 md:px-4 rounded" href="/admin/reviews">Reviews</a>
			            	</li>
			            	<li class="mx-1 md:mx-2">
			            		<a class="btn bg-blue-600 hover:bg-blue-700 text-xs md:text-sm text-white py-2 px-2 md:px-4 rounded" href="/admin/users">Users</a>
			            	</li>
			            	<li class="mx-1 md:mx-2">
			            		<a class="btn bg-blue-600 hover:bg-blue-700 text-xs md:text-sm text-white py-2 px-2 md:px-4 rounded" href="/admin/items">Items</a>
			            	</li>
			            </ul>
			        @endif
			    @endauth
	            <div>
	            	@guest
			            <ul class="flex">
			                <li class="mx-2 text-gray-800 hover:text-orange-600 mx-1">
			                    <a href="/login"><i class="fas fa-sign-in-alt mx-1"></i>Sign in</a>
			                </li>

			                <li class="mx-2 text-gray-800 hover:text-orange-600 mx-1">
			                    <a href="/register"><i class="fas fa-user-plus mx-1"></i>Sign up</a>
			                </li>
			            </ul>
			        @else
			            <a class="bg-orange-600 hover:bg-orange-700 text-sm text-white mt-2 mr-1 md:mr-4 py-2 px-3 md:px-4 rounded" href="/home" title="{{ auth()->user()->name }}">
			            	<i class="fas fa-user-alt"></i>
			            	<span class="hidden md:inline">{{ auth()->user()->name }}</span>
			            </a>
			            <a 
			                class="btn bg-red-600 hover:bg-red-800 text-sm text-white mt-2 mr-1 md:mr-8 py-2 px-3 md:px-4 rounded" 
			                title="Logout" 
			                href="{{ route('logout') }}" 
			                onclick="event.preventDefault();
			                        document.getElementById('logout-form').submit();"
			            >
			            	<i class="fas fa-sign-out-alt"></i>
			                <span class="hidden md:inline">{{ __('Logout') }}</span>
			            </a>

			            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			                @csrf
			            </form>
			        @endguest
	            </div>
	        </div>
	    </div>

	    <div class="pt-12 pb-24">
	        {{ $slot }}
	    </div>
	</div>

	<x-footer></x-footer>
</x-master>