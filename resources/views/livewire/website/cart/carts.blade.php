<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="p-0 card-body">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
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
                                        <div class="mb-5 d-flex justify-content-between align-items-center">
                                            <h1 class="mb-0 text-black fw-bold">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted">{{ $carts->count() }} Products</h6>
                                        </div>
                                        <hr class="my-4">

                                        @foreach ($items as $key => $item)
                                            <div class="mb-4 row d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="{{ Storage::url('products/'.$item['image']) }}" class="img-fluid rounded-3" alt="Product Image">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    {{-- <h6 class="text-muted">{{ $item->product->category->name }}</h6> --}}
                                                    <h6 class="mb-0 text-black">{{ $item['product_name'] }}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                                    {{-- @livewire('website.cart.quantity', ['productId' => $item->product->id]) --}}
                                                    <div>
                                                        <button wire:click="increaseQuantity({{$key}})" class="px-2 btn btn-link">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <input type="text" wire:model="items.{{$key}}.quantity" class="form-control">

                                                        <button wire:click="decreaseQuantity({{$key}})" class="px-2 btn btn-link">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">${{ $items[$key]["price"] }}</h6>
                                                    {{-- <h6 class="mb-0">${{ $item->product->price }}</h6> --}}
                                                </div>

                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a data-toggle="modal" data-target="#deleteProductModal"
                                                        wire:click="delete_product({{ $item['product_id'] }})"><i
                                                            class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <hr class="my-4">
                                        @endforeach

                                        {{-- Delete Model --}}
                                        <div>
                                            <div wire:ignore.self class="modal fade" id="deleteProductModal"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete
                                                                Product</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @if ($product_id)
                                                            @livewire('website.cart.deletefromcart', [$product_id])
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-5">
                                            <h6 class="mb-0">
                                                <a href="{{ route('shop') }}" class="text-body">
                                                    <i class="fas fa-long-arrow-alt-left me-2"></i>
                                                        Back to shop
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="pt-1 mt-2 mb-5 fw-bold">Summary</h3>
                                        <hr class="my-4">

                                        {{-- <div class="mb-4 d-flex justify-content-between">
                                            <h5 class="text-uppercase">items </h5>
                                            <h5></h5>
                                        </div> --}}

                                        {{-- <div class="mb-4 d-flex justify-content-between">
                                            <h5 class="text-uppercase">Items</h5>

                                            <h5>{{ $item[$key]['quantity'] }}</h5>
                                        </div> --}}

                                        <div class="mb-4 d-flex justify-content-between">
                                            <h5 class="text-uppercase">Shipping </h5>
                                            <h5>10$</h5>
                                        </div>
                                        <div class="mb-4 d-flex justify-content-between">
                                            <h5 class="text-uppercase">SubTotal </h5>
                                            <h5>${{ $sub_total }}</h5>
                                        </div>

                                        <h5 class="mb-3 text-uppercase">Give code</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Enter your code</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="mb-5 d-flex justify-content-between">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>${{ $total }}</h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark">
                                            <a class="btn btn-dark btn-block btn-lg"
                                                href="{{ route('checkout') }}">CheckOut</a>
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



</div>
