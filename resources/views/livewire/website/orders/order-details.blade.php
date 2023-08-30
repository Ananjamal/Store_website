<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="pt-5 container-fluid">
        <div class="row px-xl-5">
            <div class="mb-5 col-lg-12 table-responsive">
                <table class="table">
                <thead>
                        <tr>
                            <th scope="col">Date</th>

                            <th scope="col">Products</th>
                            <th scope="col">Product Num </th>
                            <th scope="col">Price</th>

                            <th scope="col">Quantity</th>
                            <th scope="col">Image</th>


                            <!-- <th scope="col">Delete</th> -->





                        </tr>
                    </thead>
                    <tbody>


                    @foreach($orderdetails as $item)
                        <tr>
                            <td>{{ $item->product->created_at }}</td>

                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->id }}</td>

                            <td>{{ $item->product->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                @if ($item->image)
                                    <img class="img-fluid" src="{{ asset(optional($item->product)->image) }}" width ="70" height ="70">
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
