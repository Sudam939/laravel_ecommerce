<x-app-layout>
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
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($carts as $index => $cart)
                                    @php
                                        $total += $cart->price; // $total = $total + $cart->price
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ ++$index }}
                                        </td>
                                        <td>
                                            <img src="{{ asset(Storage::url($cart->product->image)) }}" width="80"
                                                alt="">
                                        </td>
                                        <td>{{ $cart->product->name }}</td>
                                        <td>NRs.{{ $cart->product->price }}/-</td>
                                        <td>{{ $cart->qty }}</td>
                                        <td>NRs.{{ $cart->price }}/-</td>

                                        <td>
                                            <a href="{{ route('delete_cart', $cart->id) }}" data-confirm-delete="true"
                                                class="btn btn-danger btn-sm">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="5" class="text-center">Total</th>
                                    <th>
                                        NRs.{{ $total }}/-
                                    </th>

                                    <td>
                                        <a href="{{ route('checkout') }}" class="btn btn-success btn-sm">Check
                                            Out</a>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
