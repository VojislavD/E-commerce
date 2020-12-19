<div class="bg-gray-800">
    <div class="container mx-auto flex-col items-center md:flex md:flex-row md:items-start pt-8 pb-16 text-white">
        <div class="flex-1 px-4">
            <p class="text-xl font-semibold border-b-2 mb-4 text-center">About us</p>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="flex-1 px-4 text-center hidden md:block">
            <p class="text-xl font-semibold border-b-2 mb-4 text-center">Shopping</p>
            <ul>
                <li class="my-1">
                    <a class="hover:text-gray-500" href="/wishlist">Wish list</a>
                </li>
                <li class="my-1">
                    <a class="hover:text-gray-500" href="/cart">Shopping cart</a>
                </li>
                <li class="my-1">
                    <a class="hover:text-gray-500" href="/login">Log in</a>
                </li>
                <li class="my-1">
                    <a class="hover:text-gray-500" href="/register">Register</a>
                </li>
            </ul>
        </div>
        <div class="flex-1 px-4 text-center hidden lg:block">
            <p class="text-xl font-semibold border-b-2 mb-4 text-center">Policies</p>
            <ul>
                <li class="my-1">
                    <a class="hover:text-gray-500" class="hover:text-gray-500"href="#">Order and Returns</a>
                </li>
                <li class="my-1">
                    <a class="hover:text-gray-500" href="#">Payment Policy</a>
                </li>
                <li class="my-1">
                    <a class="hover:text-gray-500" href="#">Shipping Policy</a>
                </li>
            </ul>
        </div>
        <div class="flex-1 px-4 mt-8 md:mt-0">
            <p class="text-xl font-semibold border-b-2 mb-4 text-center">Contact</p>
            <p class="text-center">Author: Vojislav Dragicevic, May 2020</p>
            <p class="text-center">Email: <a href="mailto:contact@vojislavdragicevic.com">contact@vojislavdragicevic.com</a> </p>
            <p class="text-center">Website: <a class="text-orange-600 hover:text-orange-400" href="http://vojislavdragicevic.com/" target="_blank">vojislavdragicevic.com</a></p>
        </div>
    </div>
</div>

<script>
    //Javascript to toggle the menu
    document.getElementById('nav-toggle').onclick = function(){
        document.getElementById("nav-content").classList.toggle("hidden");
    }
</script>