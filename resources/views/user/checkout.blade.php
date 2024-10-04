<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Check Out</h4>
                    <a href="{{ route('carts') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <div>
                        <h5>Choose Your Shipping Address</h5>
                        <div class="py-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addressModal">Add Shipping Address</button>
                            <form action="{{ route('payment') }}" method="get">
                                @csrf
                                @if (count(Auth::user()->shipping_addresses) > 0)
                                    @foreach (Auth::user()->shipping_addresses as $address)
                                        <div class="d-flex align-items-baseline pt-2">
                                            <input type="radio" name="address" id="address{{ $address->id }}"
                                                value="{{ $address->id }}">
                                            <label for="address{{ $address->id }}">{{ $address->address_note }}</label>
                                        </div>
                                    @endforeach
                                @endif

                                <button type="submit" class="btn btn-success">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

{{-- Modal --}}
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Shipping Addres</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store_address') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="eg.Home" name="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="tel" class="form-control" placeholder="Phone Number" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address Note</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control"
                                placeholder="eg. Dharan 1, Prithivi Path, Near Khoi k" name="address_note">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
