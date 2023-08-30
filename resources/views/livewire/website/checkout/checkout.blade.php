<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container">
        <div class="py-5 text-center">
            {{-- <img class="mx-auto mb-4 d-block" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
                alt="" width="72" height="72"> --}}
            <h2>Checkout</h2>


        </div>

        <div class="row">
            <div class="mb-4 col-md-4 order-md-2">
                <h4 class="mb-3 d-flex justify-content-between align-items-center">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $carts->count()}}</span>
                </h4>
                <ul class="mb-3 list-group">
                    @foreach ($carts as $cart)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $cart->product->name }}</h6>
                                <small class="text-muted">{{ $cart->product->description }}</small>
                                <small class="text-muted"></small>

                            </div>
                            <span class="text-muted">{{ $cart->quantity }}</span>

                            <span class="text-muted">${{ $cart->total }}</span>

                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Shipping</h6>
                        </div>
                        <span class="text-muted">$10</span>


                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Total (USD)</h6>
                        </div>
                        <span class="text-success">${{$total }}</span>
                    </li>
                        {{-- <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <strong>${{$totalprice }}</strong>
                        </li> --}}

                </ul>


            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                    <div class="row">
                        <div class="mb-3 col-md-6">

                            <label>First name</label>
                            <input type="text" wire:model="firstname" class="form-control">
                            @error('firstname')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">

                            <label for="firstName">Last name</label>
                            <input type="text" wire:model="lastname" class="form-control">

                            @error('lastname')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">

                        <label>Email</label>
                        <input type="text" wire:model="email" class="form-control">

                        @error('email')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">

                        <label>Phone</label>
                        <input type="text" wire:model="phone" class="form-control">

                        @error('phone')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">

                        <label> address_line1</label>
                        <input type="text" wire:model="address_line1" class="form-control">

                        @error('address_line1')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">

                        <label> address_line2</label>
                        <input type="text" wire:model="address_line2" class="form-control">

                        @error('address_line2')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md-5">
                            <label for="country">Country</label>
                            <select class="custom-select" id="categories" wire:model="country">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            @error('country')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-5">
                            <label for="country">City</label>
                            <select class="custom-select" id="city" wire:model="city">
                                <option value="">Choose...</option>
                                <option>Gaza</option>
                            </select>
                            @error('city')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">

                            <label> address_line2</label>
                            <input type="text" wire:model="address_line2" class="form-control">

                            @error('address_line2')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" wire:model="state">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            @error('state')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder=""wire:model="zip">
                            @error('zip')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>
                    @error('paymentMethod')
                    <small class="text-danger"> {{ $message }} </small>
                @enderror
                    <div class="my-3 d-block">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" wire:model="paymentMethod" type="radio"
                                class="custom-control-input">
                            <label class="custom-control-label" for="credit">Credit card</label>

                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" wire:model="paymentMethod" type="radio"
                                class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">Debit card</label>

                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod"
                                wire:model="paymentMethod"wire:model="paymentMethod" type="radio"
                                class="custom-control-input" required>
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" wire:click="placeOrder">Continue to checkout</button>
                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>
            </div>
        </div>

        <footer class="pt-5 my-5 text-center text-muted text-small">
            <p class="mb-1">&copy; 2017-2018 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</div>
