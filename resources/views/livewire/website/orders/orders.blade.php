<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="pt-5 container-fluid">
        <div class="row px-xl-5">
            <div class="mb-5 col-lg-12 table-responsive">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Order Num </th>
                            <th scope="col">Name</th>

                            <th scope="col">Total Price</th>


                            <th scope="col">Details</th>
                            <!-- <th scope="col">Delete</th> -->

                            <th scope="col">Status</th>
                            <th scope="col"></th>




                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->useraddress->firstname }}</td>
                                <td>${{ $order->total_price }}</td>
                                <td>
                                    <a class="badge badge-light rounded-pill d-inline"
                                        href="{{ route('UserOrderDetails', ['id' => $order->id]) }}">More</a>
                                </td>

                                <td>
                                    <p class="badge badge-secondary rounded-pill d-inline">
                                        {{ $order->order_status }}
                                    </p>

                                </td>
                                {{-- "{{ route('UserOrderDetails', ['id' => $order->id]) }}" --}}
                                <td>
                                    <button class="badge badge-danger rounded-pill d-inline">
                                        <a wire:click="cancelOrder({{ $order->id }})">Cancel order</a>

                                    </button>

                                </td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
