<x-user>
    <div class="w-3/4 md:w-1/2 xl:w-1/3 mx-auto">
        <h1 class="text-center my-0 text-base md:text-lg bg-orange-600 text-white font-semibold py-2 rounded-t-lg">Verify Your Email Address</h1>
        
        <div class="py-6 bg-white text-sm md:text-base border border-orange-600 rounded-b-lg">

            <p class="text-center">Before proceeding, please check your email for a verification link.</p>
            
            <form class="text-center" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <p class="text-center">If you did not receive the email, <button class="text-white text-sm md:text-base rounded-lg bg-orange-600 hover:bg-orange-700 mt-2 px-4 py-2" type="submit">click here</button>  to request another.</p>
            </form>

        </div>

        @if (session('status'))
            <div class="text-center mt-4 bg-green-400 py-2 rounded-lg">
                <p>A fresh verification link has been sent to your email address.</p>
            </div>
        @endif
    </div>
</x-user>
