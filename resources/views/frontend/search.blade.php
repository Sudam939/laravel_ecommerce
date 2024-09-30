<x-frontend-layout>

    <section>
        <div class="container py-10">
            <p class="pb-5 text-2xl font-[600]">Comparing <span class="text-red-600">{{ $products->count() }}
                    products</span></p>
            <div class="grid grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>

</x-frontend-layout>
