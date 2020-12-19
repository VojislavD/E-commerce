<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0"></script>
<x-main>
    <div class="flex flex-col md:flex-row container mx-auto my-12">
        <div class="w-full md:w-1/3 px-4">
            <form method="POST" action="/wishlist/add/{{ $item->id }}">
                @csrf
                <button>
                    <i class="fas fa-heart fa-2x absolute mt-1 ml-2 text-orange-600 hover:text-orange-700 cursor-pointer transition duration-200" title="Add To Wishlist"></i>
                </button>
            </form>
            <img class="h-64 md:h-auto md:w-1/2 mx-auto" src="{{ asset($item->image_url) }}">
        </div>

        <div class="w-full md:w-2/3 text-center md:text-left px-4 md:px-8">
            <p class="text-2xl md:text-3xl font-semibold text-gray-600">{{ $item->name }}</p>
            <p class="text-gray-600 mt-4">
                {{ $item->rate }}
                @for($i=0; $i<$item->rate;$i++)
                    <i class="fas fa-star text-yellow-600"></i>
                @endfor
                @for($i=0; $i<5-$item->rate;$i++)
                    <i class="fas fa-star"></i>
                @endfor
            </p>
            <p class="text-lg font-bold text-gray-800 mt-4">$ {{ $item->price }}</p>
            <p class="text-gray-800 mt-4">{{ $item->description }}

            <form class="mt-8" method="POST" action="/cart/add/{{ $item->id }}">
                @csrf
                <button class="btn bg-orange-600 py-2 px-4 text-sm text-white font-bold hover:bg-orange-700 focus:outline-none transition duration-200" type="submit" @if($item->stock <= 0) disabled @endif>
                    Add To Cart
                </button>
            </form>

            @if($item->stock > 0)
                <p class="text-green-600 font-bold mt-8"> In Stock </p>
            @else
                <p class="text-red-600 font-bold mt-8"> Out Of Stock </p>
            @endif
            </p>
            <p class="text-gray-600 text-sm mt-2">Items Code: {{ $item->code }}</p>
            <p class="text-gray-600 text-sm mt-2">Category: <a class="text-orange-700" href="/category/{{ $item->category->name }}">{{ $item->category->name }}</a> </p>
            <p class="text-gray-600 text-sm mt-2">Tags: </p>
                <ul class="inline-flex text-orange-700 text-sm">
                    @foreach($item->tags as $tag)
                        <li class="mr-2">
                        <a href="/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                    </li>
                    @endforeach
                </ul>

            <div class="flex mt-6">
                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                <span class="mx-2"></span>
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <span class="mx-2"></span>
                <a class="bg-red-700 rounded text-sm px-3 py-1 text-white" href="mailto:?subject=Premium Fashion &amp;body=Check out this items {{ url()->current() }}" title="Share by Email">
                    <i class="fas fa-share-alt"></i> E-mail
                </a>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-8 my-24 px-4 shadow-2xl">
        <p class="text-3xl font-bold">Reviews</p>
        <ul class="my-8 mx-4">
            @foreach($item->reviews as $review)
                @if($review->status == 1)
                    <li class="my-4">
                        <p class="text-lg font-semibold">{{ $review->name }}</p>
                        <p class="px-4">{{ $review->comment }}</p>
                    </li>
                    <hr>
                @endif
            @endforeach
        </ul>
        <div class="border-2 border-orange-600 mx-4 my-8 px-4 pb-4">
            <p class="text-xl mt-4">Write a review</p>
                <form class="flex flex-col text-sm md:text-base items-start m-4" method="POST" action="/items/{{ $item->id }}/review">
                    @csrf
                    <label class="mt-4 mb-2">Your rate*</label>
                    <select class="w-12 @error('rate') border-red-600 @enderror border-2 border-gray-500" name="rate" value="{{ old('rate') }}" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option selected>5</option>
                    </select>
                    @error('rate')
                        <p class="mt-1 text-red-600 font-semibold">{{ $errors->first('rate') }}</p>
                    @enderror

                    <label class="mt-4 mb-2">Name*</label>
                    <input 
                        class="w-full md:w-1/2 px-1 border-2 @error('name') border-red-600 @enderror border-gray-500 h-8"
                        type="text" 
                        name="name" 
                        value="@auth{{ auth()->user()->name }}@else{{ old('name') }}@endauth"
                        required
                    >
                    @error('name')
                        <p class="mt-1 text-red-600 font-semibold">{{ $errors->first('name') }} </p> 
                    @enderror

                    <label class="mt-4 mb-2">Email*</label>
                    <input 
                        class="w-full md:w-1/2 px-1 border-2 @error('email') border-red-600 @enderror border-gray-500 h-8" 
                        type="email" 
                        name="email" 
                        value="@auth{{ auth()->user()->email }}@else{{ old('email') }}@endauth"
                        required
                    >
                    @error('email')
                        <p class="mt-1 text-red-600 font-semibold">{{ $errors->first('email') }}</p>
                    @enderror

                    <label class="mt-4 mb-2">Review*</label>
                    <textarea 
                        class="w-full md:w-1/2 px-1 border-2 @error('comment') border-red-600 @enderror border-gray-500" 
                        name="comment" 
                        rows="5"
                        required
                    >{{ old('comment') }}</textarea>
                    @error('comment')
                        <p class="mt-1 text-red-600 font-semibold">{{ $errors->first('comment') }}</p>
                    @enderror

                    <button class="bg-orange-600 py-2 px-8 mt-8 text-sm text-white font-bold hover:bg-orange-700 transition duration-200" type="submit"><i class="fas fa-paper-plane"></i> Send</button>

                </form>      
                <p class="text-sm md:text-base mt-8 mx-4">* All fields are required</p>

                @if(session('ReviewSuccess'))
                    <p class="my-4 mx-4 text-sm md:text-base text-green-600 font-semibold"> {{ session('ReviewSuccess') }} </p>
                @endif
        </div>
    </div>


    <div class="container mx-auto h-auto py-16 mb-16">
        <p class="mx-8 mb-6 lg:mx-auto text-center border-b-2 border-black uppercase text-2xl font-bold">Similar products</p>

        <div class="pl-4 pr-4">
            <ul class="flex flex-col lg:flex-row mx-8 lg:mx-auto">
                @forelse($similarItems as $similarItem)
                    <li class="w-full lg:w-1/6 mx-2 shadow-lg p-2 m-h-32">
                        <form method="POST" action="/wishlist/add/{{ $similarItem->id }}">
                            @csrf
                            <button>
                                <i class="fas fa-heart fa-2x absolute mt-1 ml-2 text-orange-600 hover:text-orange-700 cursor-pointer transition duration-200" title="Add To Wishlist"></i>
                            </button>
                        </form>
                        <a class="text-center lg:text-left" href="/items/{{ $similarItem->id }}">
                            <img class="h-48 mx-auto" src="{{ asset($similarItem->image_url) }}">
                            <p class="text-sm text-gray-600">{{ $similarItem->category->name }}</p>
                            <p class="h-15 lg:h-20 lg:mb-4">{{ substr($similarItem->name,0,50) }}...</p>
                            <p class="font-bold mb-5">${{ $similarItem->price }}</p>
                        </a>
                    </li>
                @empty
                    <p class="w-full text-center text-lg">There is no similar items.</p>
                @endforelse
            </ul>            
        </div>
    </div>
</x-main>