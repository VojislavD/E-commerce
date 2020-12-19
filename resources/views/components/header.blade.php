<div class="flex items-center justify-around pt-1 min-h-8 mx-auto container md:container md:justify-between">
    <div class="flex items-center justify-center text-sm">
        <i class="fas fa-clock mr-1 md:mr-2"></i>
        <span> 08:00 - 16:00 </span>

        <span class="mx-2 md:mx-4">|</span>

        <i class="fas fa-phone-alt mr-1 md:mr-2"></i>
        <span> 065 123 45 67 </span>
    </div>

    <div class="flex items-center justify-center">
        @guest
            <ul class="flex mr-8">
                <li class="mr-4 hover:text-orange-600 transition duration-200">
                    <a href="/login"><i class="fas fa-sign-in-alt"></i></a>
                </li>

                <li class="hover:text-orange-600 transition duration-200">
                    <a href="/register"><i class="fas fa-user-plus"></i></a>
                </li>
            </ul>
        @else
            <a class="text-sm text-orange-600 border border-orange-600 rounded py-1 px-4 mx-2 hover:bg-orange-600 hover:text-white md:flex md:items-center md:mr-4 transition duration-200" title="{{ auth()->user()->name }}" href="/home">
                <i class="fas fa-user-alt"></i>
                <span class="hidden md:block md:ml-2">{{ auth()->user()->name }}</span>
            </a>
            <a 
                class="text-sm text-white border border-red-600 bg-red-600 hover:bg-red-800 py-1 px-4 mr-8 rounded md:flex md:items-center transition duration-200"
                title="Log out" 
                href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
            >
                <i class="fas fa-sign-out-alt"></i>
                <span class="hidden md:block md:ml-2 transition duration-300">{{ __('Logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest

        <ul class="hidden md:block md:flex md:items-center">
            <li class="mr-2">
                <a href="https://www.facebook.com/" target="_blank">
                    
                <svg class="w-4" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M374.245,285.825l14.104,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.117,0l0,-78.291c0,0 -36.408,-6.214 -71.214,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.542 32.798,3.865 49.709,3.865c16.911,0 33.512,-1.323 49.708,-3.865l0,-222.31l74.129,0Z" style="fill:#1877f2;fill-rule:nonzero;"/></svg>
                </a>
            </li>

            <li class="mr-2">
                <a href="https://www.instagram.com/" target="_blank">
                    <svg class="w-4" enable-background="new 0 0 128 128" id="Social_Icons" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="_x37__stroke"><g id="Instagram_1_"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128" width="128"/><radialGradient cx="19.1111" cy="128.4444" gradientUnits="userSpaceOnUse" id="Instagram_2_" r="163.5519"><stop offset="0" style="stop-color:#FFB140"/><stop offset="0.2559" style="stop-color:#FF5445"/><stop offset="0.599" style="stop-color:#FC2B82"/><stop offset="1" style="stop-color:#8E40B7"/></radialGradient><path clip-rule="evenodd" d="M105.843,29.837    c0,4.242-3.439,7.68-7.68,7.68c-4.241,0-7.68-3.438-7.68-7.68c0-4.242,3.439-7.68,7.68-7.68    C102.405,22.157,105.843,25.595,105.843,29.837z M64,85.333c-11.782,0-21.333-9.551-21.333-21.333    c0-11.782,9.551-21.333,21.333-21.333c11.782,0,21.333,9.551,21.333,21.333C85.333,75.782,75.782,85.333,64,85.333z M64,31.135    c-18.151,0-32.865,14.714-32.865,32.865c0,18.151,14.714,32.865,32.865,32.865c18.151,0,32.865-14.714,32.865-32.865    C96.865,45.849,82.151,31.135,64,31.135z M64,11.532c17.089,0,19.113,0.065,25.861,0.373c6.24,0.285,9.629,1.327,11.884,2.204    c2.987,1.161,5.119,2.548,7.359,4.788c2.24,2.239,3.627,4.371,4.788,7.359c0.876,2.255,1.919,5.644,2.204,11.884    c0.308,6.749,0.373,8.773,0.373,25.862c0,17.089-0.065,19.113-0.373,25.861c-0.285,6.24-1.327,9.629-2.204,11.884    c-1.161,2.987-2.548,5.119-4.788,7.359c-2.239,2.24-4.371,3.627-7.359,4.788c-2.255,0.876-5.644,1.919-11.884,2.204    c-6.748,0.308-8.772,0.373-25.861,0.373c-17.09,0-19.114-0.065-25.862-0.373c-6.24-0.285-9.629-1.327-11.884-2.204    c-2.987-1.161-5.119-2.548-7.359-4.788c-2.239-2.239-3.627-4.371-4.788-7.359c-0.876-2.255-1.919-5.644-2.204-11.884    c-0.308-6.749-0.373-8.773-0.373-25.861c0-17.089,0.065-19.113,0.373-25.862c0.285-6.24,1.327-9.629,2.204-11.884    c1.161-2.987,2.548-5.119,4.788-7.359c2.239-2.24,4.371-3.627,7.359-4.788c2.255-0.876,5.644-1.919,11.884-2.204    C44.887,11.597,46.911,11.532,64,11.532z M64,0C46.619,0,44.439,0.074,37.613,0.385C30.801,0.696,26.148,1.778,22.078,3.36    c-4.209,1.635-7.778,3.824-11.336,7.382C7.184,14.3,4.995,17.869,3.36,22.078c-1.582,4.071-2.664,8.723-2.975,15.535    C0.074,44.439,0,46.619,0,64c0,17.381,0.074,19.561,0.385,26.387c0.311,6.812,1.393,11.464,2.975,15.535    c1.635,4.209,3.824,7.778,7.382,11.336c3.558,3.558,7.127,5.746,11.336,7.382c4.071,1.582,8.723,2.664,15.535,2.975    C44.439,127.926,46.619,128,64,128c17.381,0,19.561-0.074,26.387-0.385c6.812-0.311,11.464-1.393,15.535-2.975    c4.209-1.636,7.778-3.824,11.336-7.382c3.558-3.558,5.746-7.127,7.382-11.336c1.582-4.071,2.664-8.723,2.975-15.535    C127.926,83.561,128,81.381,128,64c0-17.381-0.074-19.561-0.385-26.387c-0.311-6.812-1.393-11.464-2.975-15.535    c-1.636-4.209-3.824-7.778-7.382-11.336c-3.558-3.558-7.127-5.746-11.336-7.382c-4.071-1.582-8.723-2.664-15.535-2.975    C83.561,0.074,81.381,0,64,0z" fill="url(#Instagram_2_)" fill-rule="evenodd" id="Instagram"/></g></g></svg>
                </a>
            </li>
            <li class="mr-4">
                <a href="https://www.youtube.com/" target="_blank">
                    <svg class="w-4" enable-background="new 0 0 32 32" height="32px" id="Layer_1" version="1.0" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M31.67,9.179c0,0-0.312-2.353-1.271-3.389c-1.217-1.358-2.58-1.366-3.205-1.443C22.717,4,16.002,4,16.002,4   h-0.015c0,0-6.715,0-11.191,0.347C4.171,4.424,2.809,4.432,1.591,5.79C0.633,6.826,0.32,9.179,0.32,9.179S0,11.94,0,14.701v2.588   c0,2.763,0.32,5.523,0.32,5.523s0.312,2.352,1.271,3.386c1.218,1.358,2.815,1.317,3.527,1.459C7.677,27.919,15.995,28,15.995,28   s6.722-0.012,11.199-0.355c0.625-0.08,1.988-0.088,3.205-1.446c0.958-1.034,1.271-3.386,1.271-3.386s0.32-2.761,0.32-5.523v-2.588   C31.99,11.94,31.67,9.179,31.67,9.179z" fill="#E02F2F"/><polygon fill="#FFFFFF" points="12,10 12,22 22,16  "/></g><g/><g/><g/><g/><g/><g/></svg>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="container mx-auto min-h-24 flex-col justify-center pb-4 md:flex md:flex-row md:pb-0">
    <div class="flex items-center justify-around md:flex-1 md:justify-start">
        <a href="/"><img class="h-24 md:h-32" src="/images/logo.png"></a>
        <form class="flex justify-end items-center relative md:w-full md:px-8" method="GET" action="/items/search">
            <input 
                class="p-1 pl-4 text-sm border-2 border-gray-400 rounded focus:outline-none md:w-full" 
                type="text" 
                name="keyword" 
                placeholder="Search"
                value="{{ request('keyword') }}" 
            >
            <button type="submit" class="focus:outline-none active:outline-none absolute pr-2">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     viewBox="0 0 24 24" class="w-5 h-5">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>
    </div>
    <ul class="flex items-center justify-center">
        <li>
            <a class="flex items-center" href="/wishlist">
                <i class="fas fa-heart mr-1 @empty(!session('wishlist')) text-orange-700 @endempty"></i>
                @empty(!session('wishlist'))
                    <sup class="text-sm font-semibold text-orange-700 mr-1">
                        {{ count(session('wishlist')) }}
                    </sup>
                @endempty
                <span class="mx-1"> Wish list </span>
            </a>
        </li>
        <span class="mx-4"> | </span>
        <li>
            <a class="flex items-center" href="/cart">
                <i class="fas fa-shopping-cart mr-1 @empty(!session('cart')) text-orange-700 @endempty"></i>
                @empty(!session('cart'))
                    <sup class="text-sm font-semibold text-orange-700 mr-1">
                        {{ count(session('cart')) }}
                    </sup>
                @endempty
                <span class="mx-1"> Cart </span>
            </a>
        </li>
        
    </ul>
</div>

<nav class="flex items-start justify-start flex-wrap bg-orange-600 w-full z-10">
    <div class="block lg:hidden">
        <button id="nav-toggle" class="flex items-center justify-center px-3 py-2 border rounded text-white border-white hover:text-orange-600 hover:border-orange-600 hover:bg-white z-10 m-2">
            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>

    <div class="hidden container mx-auto w-full flex-grow text-center lg:flex lg:items-center lg:just py-3" id="nav-content">
        <ul class="list-reset lg:flex items-center text-sm font-semibold text-white min-h-12">
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 uppercase" href="/category/new">New</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/top">Top</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/trousers">Trousers</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/sweatpants">Sweatpants</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/dresses">Dresses</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/skirts">Skirts</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/t-shirts">T-Shirts</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/shirts">Shirts</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/sweaters">Sweaters</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/jackets">Jackets</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/sneakers">Sneakers</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/shoes">Shoes</a>
            </li>
            <li class="lg:border-r lg:border-white">
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/boots">Boots</a>
            </li>
            <li>
                <a class="inline-block no-underline py-1 px-2 transition duration-500 hover:text-black transform hover:-translate-y-1 hover:scale-105 hover:text-black uppercase" href="/category/handbags">Handbags</a>
            </li>
        </ul>
    </div>
</nav>