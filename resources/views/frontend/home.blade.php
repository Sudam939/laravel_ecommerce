<x-frontend-layout>

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
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                SEND A REQUEST
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
                                        <input type="text" name="phone" id="phone" class="w-full rounded-md"
                                            value="{{ old('phone') }}" placeholder="eg. 9800000000">
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
                                        <input type="text" name="address" id="address" class="w-full rounded-md"
                                            value="{{ old('address') }}" placeholder="eg. Dharan 1, Sunsari">
                                        @error('address')
                                            <span class="text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-2">
                                        <button type="submit" class="bg-[#009900] px-4 py-1 rounded-md text-white">Send
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

</x-frontend-layout>
