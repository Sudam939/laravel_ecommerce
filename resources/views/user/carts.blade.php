<x-app-layout>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Carts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                SN
                                            </th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $index => $cart)
                                            <tr>
                                                <td>
                                                    {{ ++$index }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset(Storage::url($cart->product->image)) }}"
                                                        width="80" alt="">
                                                </td>
                                                <td>{{ $cart->product->name }}</td>
                                                <td>NRs.{{ $cart->product->price }}/-</td>
                                                <td>{{ $cart->qty }}</td>
                                                <td>NRs.{{ $cart->price }}/-</td>

                                                <td>
                                                    <a href="{{ route('delete_cart', $cart->id) }}"
                                                        data-confirm-delete="true"
                                                        class="btn btn-danger btn-sm">delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
