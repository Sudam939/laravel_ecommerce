@props(['product'])

<div class="cursor-pointer grid grid-cols-5 gap-4 items-center border rounded-md overflow-hidden hover:shadow-md"
    data-modal-target="cart-modal-{{ $product->id }}" data-modal-toggle="cart-modal-{{ $product->id }}" type="button">
    <div class="col-span-2">
        <img class="w-full h-[100px] object-cover" src="{{ asset(Storage::url($product->image)) }}"
            alt="{{ $product->name }}">
    </div>

    <div class="text-sm pr-2 col-span-3">
        <h1 class="font-semibold">{{ $product->name }}</h1>
        <p>Rs. {{ $product->price }}</p>
        <p>{{ $product->vendor->vendor_stores[0]->name }}</p>
    </div>
</div>

<div id="cart-modal-{{ $product->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between px-4 py-2 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold primary dark:text-white">
                    Add to cart
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="cart-modal-{{ $product->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <div class="grid grid-cols-5 gap-6 items-center">
                    <div class="col-span-2">
                        <img class="w-full h-full" src="{{ asset(Storage::url($product->image)) }}"
                            alt="{{ $product->name }}">
                    </div>

                    <div class="col-span-3 space-y-2">
                        <h1 class="primary text-xl font-semibold">{{ $product->name }}</h1>
                        <p>NRs.{{ $product->price }}/-</p>

                        <form action="{{ route('store_cart') }}" method="post">
                            @csrf
                            <div class="flex gap-2 items-center">
                                <input type="text" name="product_id" hidden value="{{ $product->id }}">
                                <input type="number" min="1" max="10" name="qty" id="qty"
                                    value="1" required>
                                <button type="submit" class="px-4 py-2 rounded-md bg-primary text-white">add to
                                    cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
