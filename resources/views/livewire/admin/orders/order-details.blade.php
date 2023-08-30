<div>
    <div class="py-4 container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="my-4 card">
                    <div class="p-0 mx-3 card-header position-relative mt-n4 z-index-2">
                        <div class="pt-4 pb-3 bg-gradient-primary shadow-primary border-radius-lg">
                            <h6 class="text-white text-capitalize ps-3">Order Products Table</h6>
                        </div>
                    </div>
                    <div class="px-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Product#</th>
                                        <th
                                            class="text-uppercase text-secondary text font-weight-bolder opacity-7 ps-2">
                                            Product Name</th>
                                        <th
                                            class="text-uppercase text-secondary text font-weight-bolder opacity-7 ps-2">
                                            Price</th>
                                        <th class="text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Quantity</th>
                                        <th class="text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderProducts as $item)
                                        <tr>
                                            <td>
                                                <p class="mb-0 text font-weight-bold">{{ $item->product->id }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text font-weight-bold">{{ $item->product->name }}</p>
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $item->product->price }}
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $item->quantity }}
                                            </td>
                                            <td>
                                                @if ($item->image)
                                                    <img class="img-fluid"
                                                        src="{{ asset(optional($item->product)->image) }}"
                                                        width="70" height="70">
                                                @endif
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
</div>
