<x-frontend-layout>

    <section>
        <div class="relative">
            <img class="h-[450px] w-full object-cover" src="{{ asset(Storage::url($vendor_store->featured_image)) }}"
                alt="{{ $vendor_store->name }}">

            <div class="absolute bottom-0 bg-[#0000007f] w-full text-white font-semibold">
                <div class="flex gap-10 items-center container">
                    <img class="h-[100px] w-[100px] object-cover"
                        src="{{ asset(Storage::url($vendor_store->featured_image)) }}" alt="{{ $vendor_store->name }}">
                    <div>
                        <h2 class="text-xl">{{ $vendor_store->name }}
                        </h2>
                        <p class="text-sm">{{ $vendor_store->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container py-10 space-y-6">
            <div class="grid grid-cols-4 items-center">
                <div>
                    <a href="{{ route('vendor', $vendor_store->vendor->id) }}" class="text-xl primary font-semibold">All
                        Menu</a>
                </div>

                <div class="col-span-3">
                    <form action="{{ route('vendor', $vendor_store->vendor->id) }}" method="get">
                        <div class="flex">
                            <input type="search" name="q" id="search" class="w-full rounded-s-lg"
                                placeholder="search product by name">
                            <button type="submit"
                                class="bg-black text-white font-bold px-4 rounded-e-lg">SEARCH</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

</x-frontend-layout>
