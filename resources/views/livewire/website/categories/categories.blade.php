<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category )

            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="{{ $category->image }}" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">{{ $category->name }}</h5>
                <p class="text-center"><a class="btn btn-success" href="{{ route('products-category',['id'=> $category->id] )}}">Go Shop</a></p>
            </div>
            @endforeach


        </div>
    </section>
</div>
