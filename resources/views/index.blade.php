<x-main>
    <x-carousel></x-carousel>
    <div class="container mx-auto h-auto py-16">
        <p class=" text-center uppercase text-2xl border-b-2 border-black mx-4 lg:mx-auto mb-12 font-bold">Newest items</p>

        <div class="px-4">
            <ul class="flex-col lg:flex lg:flex-row items-center justify-center">
                @foreach($latestItems as $latestItem)
                    <li class="w-full lg:w-1/6 mx-2 my-2 shadow-xl p-2 m-h-32">
                        <form method="POST" action="/wishlist/add/{{ $latestItem->id }}">
                            @csrf
                            <button>
                                <i class="fas fa-heart fa-2x absolute mt-1 ml-2 text-orange-600 hover:text-orange-700 cursor-pointer z-10 transition duration-200" title="Add To Wishlist"></i>
                            </button>
                        </form>
                        <a href="/items/{{ $latestItem->id }}">
                            <img class="h-48 mx-auto" src="{{ asset($latestItem->image_url) }}">
                            <p class="text-center lg:text-left text-sm text-gray-600">{{ $latestItem->category->name }}</p>
                            <p class="text-center lg:text-left h-10 lg:h-20 lg:mb-4">{{ substr($latestItem->name,0,50) }}...</p>
                            <p class="text-center lg:text-left font-bold mb-5">${{ $latestItem->price }}</p>
                        </a>
                        @if($latestItem->stock > 0)
                            <form class="flex justify-center lg:justify-start" method="POST" action="/cart/add/{{ $latestItem->id }}">
                                @csrf
                                <button class="bg-orange-600 py-2 px-4 text-sm text-white font-bold hover:bg-orange-700 transition duration-200" type="submit">Add to cart</button>
                            </form>
                        @else
                            <p class="text-red-600 font-bold text-center">Out of stock</p>
                        @endif

                    </li>
                @endforeach
            </ul>            
        </div>
    </div>
    <div class="container mx-auto h-auto py-16">
        <p class="text-center uppercase text-2xl border-b-2 border-black mx-4 lg:mx-auto mb-12 font-bold">Top Items</p>

        <div class="px-4">
            <ul class="flex-col lg:flex lg:flex-row">
                @foreach($topItems as $topItem)
                    <li class="w-full lg:w-1/6 mx-2 my-2 shadow-xl p-2 m-h-32">
                        <form method="POST" action="/wishlist/add/{{ $topItem->id }}">
                            @csrf
                            <button>
                                <i class="fas fa-heart fa-2x absolute mt-1 ml-2 text-orange-600 hover:text-orange-700 cursor-pointer transition duration-200" title="Add To Wishlist"></i>
                            </button>
                        </form>
                        <a href="/items/{{ $topItem->id }}">
                            <img class="h-48 mx-auto" src="{{ asset($topItem->image_url) }}">
                            <p class="text-center lg:text-left text-sm text-gray-600">{{ $topItem->category->name }}</p>
                            <p class="text-center lg:text-left h-10 lg:h-20 lg:mb-4">{{ substr($topItem->name,0,50) }}...</p>
                            <p class="text-center lg:text-left font-bold mb-5">${{ $topItem->price }}</p>
                        </a>
                        @if($topItem->stock > 0)
                            <form class="flex justify-center lg:justify-start" method="POST" action="/cart/add/{{ $topItem->id }}">
                                @csrf
                                <button class="bg-orange-600 py-2 px-4 text-sm text-white font-bold hover:bg-orange-700 transition duration-200" type="submit">Add to cart</button>
                            </form>
                        @else
                            <p class="text-red-600 font-bold text-center">Out of stock</p>
                        @endif

                    </li>
                @endforeach
            </ul>            
        </div>
    </div>

    <div class="container mx-auto mt-24 mb-24">
        <ul class="flex-col md:flex md:flex-row">
            <li class="flex-1 text-center text-sm md:text-base border-solid border-2 border-orange-600 shadow-lg p-4 m-4 rounded-lg hover:bg-orange-600 hover:text-white text-orange-600 transition duration-300">
                <i class="fas fa-shipping-fast fa-3x mb-4"></i>
                <p class="font-bold">Free Shipping on Order $100 or More</p>
            </li>
            <li class="flex-1 text-center text-sm md:text-base border-solid border-2 border-orange-600 shadow-lg p-4 m-4 rounded-lg hover:bg-orange-600 hover:text-white text-orange-600 transition duration-300">
                <i class="fas fa-shield-alt fa-3x mb-4"></i>
                <p class="font-bold">Secure shopping</p>
            </li>
            <li class="flex-1 text-center text-sm md:text-base border-solid border-2 border-orange-600 shadow-lg p-4 m-4 rounded-lg hover:bg-orange-600 hover:text-white text-orange-600 transition duration-300">
                <i class="fas fa-headset fa-3x mb-4"></i>
                <p class="font-bold">Online Support</p>
            </li>
        </ul>
    </div>

    <div class="bg-blue-800">
        <div class="container mx-auto py-16 px-8 text-white">
            <p class="text-center md:text-left text-2xl md:text-3xl font-bold uppercase mb-4">Subscribe to our news letter</p>
            <p class="text-center md:text-left w-full md:w-1/3 mb-4">Enter your email to stay updated to the latest updates and more.</p>
        
            <form class="flex justify-center md:justify-start" method="" action="">
                <input class="w-1/2 py-1 md:py-2 mr-1 px-4 text-black text-sm md:text-base" type="email" name="email" placeholder="E-mail">
                <button class="bg-yellow-500 hover:bg-yellow-600 text-sm md:text-base text-black font-semibold py-1 md:p-2 px-8 transition duration-200" type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</x-main>