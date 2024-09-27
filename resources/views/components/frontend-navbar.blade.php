<nav class="bg-[#009900] py-2">
    <div class="container">
        <div class="flex items-center justify-between gap-32">
            <div>
                <img class="h-16" src="https://codeit.com.np/storage/01J5QRFCE6530G343Q9YVMYAZW.webp" alt="Logo">
            </div>

            <div class="flex-grow">
                <form action="" method="get">
                    <div class="flex">
                        <input type="search" name="q" id="search" class="w-full rounded-s-lg"
                            placeholder="compare products">
                        <button type="submit" class="bg-gray-300 primary font-bold px-4 rounded-e-lg">COMPARE</button>
                    </div>
                </form>
            </div>

            <div class="flex gap-6 items-center">
                @if (Auth::Check() && Auth::guard('web')->user())
                    <a href="{{ route('register') }}" class="text-white text-xl"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <a href="{{ route('dashboard') }}" class="secondary text-xl"><i class="fa-solid fa-user"></i></a>
                @else
                    <a href="{{ route('register') }}" class="border border-white px-4 py-1 rounded-md text-white">SignUp</a>
                    <a href="{{ route('login') }}" class="bg-secondary px-4 py-1 rounded-md">Login <i
                            class="fa-solid fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </div>
</nav>
