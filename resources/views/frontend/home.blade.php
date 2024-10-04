<x-frontend-layout>

    {{-- Carousels --}}
    <section>
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-[200px] overflow-hidden md:h-[400px] lg:h-[500px] xl:h-[600px]">
                @foreach ($carousels as $carousel)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset(Storage::url($carousel->image)) }}"
                            class="absolute block w-full object-cover h-[200px] md:h-[400px] lg:h-[500px] xl:h-[600px] -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="Carousel Image">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($carousels as $index => $carousel)
                    <button type="button" class="w-3 h-3 rounded-full"
                        aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ ++$index }}"
                        data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>
    {{-- Carousels --}}


    {{-- Featured Restaurant/Store --}}
    <section>
        <div class="container py-10 space-y-6">

            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-semibold primary">Featured Restaurant/Store</h1>
                    <p>The nearest restaurant/store to your location</p>
                </div>

                <div>
                    <a href="">View all <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>


            <div class="grid grid-cols-3 gap-6">
                @foreach ($vendors as $vendor)
                    <a href="{{ route('vendor', $vendor->id) }}">
                        <div class="border rounded-md overflow-hidden hover:shadow-lg duration-300">
                            <img class="h-[200px] w-full object-cover"
                                src="{{ asset(Storage::url($vendor->vendor_stores[0]->featured_image)) }}"
                                alt="">

                            <div class="py-2 px-3">
                                <h2 class="font-semibold">{{ $vendor->vendor_stores[0]->name }}, Menus
                                    ({{ $vendor->products->where('status', 1)->count() }})
                                </h2>
                                <p class="text-sm">{{ $vendor->vendor_stores[0]->address }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Featured Restaurant/Store --}}


    {{-- Vendor Request --}}
    <section class="py-10">
        <div class="container">
            <div class="flex flex-col items-center text-center w-[54%] m-auto gap-5">
                <h3 class="text-2xl">
                    List your Restaurant or Store at Floor Digital Pvt. Ltd.!
                    Reach 1,00,000 + new customers.
                </h3>

                <button data-modal-target="request-modal" data-modal-toggle="request-modal"
                    class="bg-[#009900] px-4 py-1 rounded-md text-white" type="button">
                    SEND A REQUEST
                </button>
            </div>

            <!-- Main modal -->
            <div id="request-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                SEND A REQUEST
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="request-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="{{ route('vendor_store') }}" method="post">
                                @csrf

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="name">Enter Your Name <span
                                                class="text-red-600">*</span></label>
                                        <input type="text" name="name" id="name" class="w-full rounded-md"
                                            value="{{ old('name') }}" placeholder="eg. Sudam Shrestha" required>
                                        @error('name')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email">Enter Email Address <span
                                                class="text-red-600">*</span></label>
                                        <input type="email" name="email" id="email" class="w-full rounded-md"
                                            value="{{ old('email') }}" placeholder="eg. email@example.com">
                                        @error('email')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone">Enter Phone Number <span
                                                class="text-red-600">*</span></label>
                                        <input type="text" name="phone" id="phone"
                                            class="w-full rounded-md" value="{{ old('phone') }}"
                                            placeholder="eg. 9800000000">
                                        @error('phone')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="vendor_name">Enter Vendor Name <span
                                                class="text-red-600">*</span></label>
                                        <input type="text" name="vendor_name" id="vendor_name"
                                            class="w-full rounded-md" value="{{ old('vendor_name') }}"
                                            placeholder="eg. Paachthare Nembang Fresh house">
                                        @error('vendor_name')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="address">Enter Vendor Address <span
                                                class="text-red-600">*</span></label>
                                        <input type="text" name="address" id="address"
                                            class="w-full rounded-md" value="{{ old('address') }}"
                                            placeholder="eg. Dharan 1, Sunsari">
                                        @error('address')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-2">
                                        <button type="submit"
                                            class="bg-[#009900] px-4 py-1 rounded-md text-white">Send
                                            Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    {{-- Vendor Request --}}

   

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12332.5016160911!2d87.2862987!3d26.8188851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef4175e4f26a95%3A0x9b8526c7c4c7bc1c!2sCode%20IT!5e1!3m2!1sen!2snp!4v1728051887440!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



</x-frontend-layout>
