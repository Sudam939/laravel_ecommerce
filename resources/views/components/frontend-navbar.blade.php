<nav class="bg-[#009900] py-2 sticky top-0 z-[100]">
    <div class="container">
        <div class="hidden lg:flex items-center justify-between gap-32">
            <a href="{{ route('home') }}">
                <img class="h-16" src="https://codeit.com.np/storage/01J5QRFCE6530G343Q9YVMYAZW.webp" alt="Logo">
            </a>

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
                    <a href="{{ route('register') }}"
                        class="border border-white px-4 py-1 rounded-md text-white">SignUp</a>
                    <a href="{{ route('login') }}" class="bg-secondary px-4 py-1 rounded-md">Login <i
                            class="fa-solid fa-arrow-right"></i></a>
                @endif
            </div>
        </div>

        <div class="flex lg:hidden justify-between items-center">
            <a href="{{ route('home') }}">
                <img class="h-16" src="https://codeit.com.np/storage/01J5QRFCE6530G343Q9YVMYAZW.webp" alt="Logo">
            </a>

            <div>
                <button class="text-white text-xl" type="button" data-drawer-target="drawer-example"
                    data-drawer-show="drawer-example" aria-controls="drawer-example">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>


{{-- Drawer --}}
<div id="drawer-example"
    class="fixed top-0 left-0 z-[200] h-screen p-4 space-y-6 overflow-y-auto transition-transform -translate-x-full bg-primary w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label" class="inline-flex items-center mb-4 text-xl font-semibold text-white dark:text-white">
        Menu
    </h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
        class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <form action="" method="get">
        <div class="flex">
            <input type="search" name="q" id="search" class="w-full rounded-s-lg"
                placeholder="compare products">
            <button type="submit" class="bg-gray-300 primary font-bold px-4 rounded-e-lg">COMPARE</button>
        </div>
    </form>

    <div class="flex gap-6 items-center">
        @if (Auth::Check() && Auth::guard('web')->user())
            <a href="{{ route('register') }}" class="text-white text-xl"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="{{ route('dashboard') }}" class="secondary text-xl"><i class="fa-solid fa-user"></i></a>
        @else
            <a href="{{ route('register') }}" class="border border-white px-4 py-1 rounded-md text-white">SignUp</a>
            <a href="{{ route('login') }}" class="bg-secondary px-4 py-1 rounded-md">Login <i
                    class="fa-solid fa-arrow-right"></i></a>
        @endif
    </div>
</div>
