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
                            <h6 class="text-white text-capitalize ps-3">Orders Table</h6>
                        </div>
                    </div>
                    <div class="px-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Date
                                        </th>
                                        <th class="text-center align-middle text-uppercase text-secondary text font-weight-bolder opacity-7 ps-2">
                                            Order #
                                        </th>
                                        <th class="text-center align-middle text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-center align-middle text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Total Price
                                        </th>
                                        <th class="text-center align-middle text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-center align-middle text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center align-middle">
                                            <p class="mb-0 text font-weight-bold">{{ $order->created_at }}</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            <p class="mb-0 text font-weight-bold">{{ $order->id }}</p>
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $order->user->name }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $order->total_price }}
                                        </td>
                                        <td class="text-center align-middle">
                                            {{-- @livewire('admin.orders.order-status', ['order' => $order->id]) --}}
                                            <p style="font-size: 20px; font-family: serif; background-color: #f0f0f0; border-radius: 10px;" class="text-center align-middle">
                                                {{ $order->order_status }}
                                            </p>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#updateStatusModal"
                                                wire:click="edit_category({{ $order->id }})"
                                                class="btn btn-danger">
                                                Edit
                                            </button>

                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-success">
                                                <a href="{{ route('ordersDetails', ['id' => $order->id]) }}">More</a>
                                            </button>
                                        </td>
                                    </tr>

                                    @endforeach
                                    <div wire:ignore.self class="modal fade" id="updateStatusModal" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @if ($category_id)
                                                @livewire('admin.categories.edit', [$category_id])
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
