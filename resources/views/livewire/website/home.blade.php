<div>
    {{-- Do your work, then step back. --}}

    @livewire('website.slider.slider')

      <!-- Start Categories of The Month -->

    @livewire('website.categories.categories')

    <!-- End  of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="py-3 text-center row">
                <div class="m-auto col-lg-6">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)

                <div class="mb-4 col-12 col-md-4">
                    <div class="card h-100">
                        <a href="{{ route('productDetails', ['id' => $product->id]) }}">
                            <img src="{{ $product->image }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-right text-muted">${{ $product->price }}</li>
                            </ul>
                            <a href="{{ route('productDetails', ['id' => $product->id]) }}">{{ $product->name }}</a>
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{-- {{ $products->links() }} --}}


            </div>
        </div>
    </section>
    <!-- End Featured Product -->
</div>
