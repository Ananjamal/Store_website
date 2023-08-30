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
                            <h6 class="text-white text-capitalize ps-3">Products Table</h6>
                            <h4>
                                <button wire:click="addProductModal" type="button" class="btn btn-success float-end"
                                    data-toggle="modal" data-target="#addProductModal">Add Product
                                </button>
                            </h4>
                        </div>
                    </div>
                    <div class="px-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text font-weight-bolder opacity-7">Name
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text font-weight-bolder opacity-7 ps-2">
                                            Description</th>
                                        <th
                                            class="text-uppercase text-secondary text font-weight-bolder opacity-7 ps-2">
                                            Category</th>
                                        <th
                                            class="text-uppercase text-secondary text font-weight-bolder opacity-7 ps-2">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Image</th>
                                        <th class="text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Actions</th>

                                        {{-- <th class="text-secondary opacity-7">Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="px-2 py-1 d-flex">
                                                    {{-- <div>
                                                    <img src="../assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                                                        {{-- <p class="mb-0 text-xs text-secondary">john@creative-tim.com
                                                    </p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text font-weight-bold">{{ $product->description }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text font-weight-bold">{{ $product->category->name }}</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text font-weight-bold">{{ $product->price }} $</p>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-xs text-secondary font-weight-bold">
                                                    <img src="{{ $product->image }}" height="100" width="100"
                                                        alt="user1">

                                                </span>
                                            </td>
                                            <td>
                                                <button data-toggle="modal" data-target="#updateProductModal"
                                                    wire:click="edit_product({{ $product->id }})"
                                                    class="btn btn-danger">
                                                    Edit
                                                </button>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#deleteProductModal"
                                                    wire:click="delete_product({{ $product->id }})">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $products->links() }}

                            <div>

                                <div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1"
                                    role="dialog" aria-labelledby="create-modal" aria-hidden="true"
                                    xmlns="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add posts</h5>
                                                <button type="button" id="closemodal1" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @livewire('admin.products.create')
                                        </div>
                                    </div>
                                </div>

                                <div wire:ignore.self class="modal fade" id="updateProductModal" tabindex="-1"
                                    role="dialog" aria-labelledby="create-modal" aria-hidden="true"
                                    xmlns="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Category</h5>
                                                <button type="button" id="closemodal1" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @if ($product_id)
                                                @livewire('admin.products.edit', [$product_id])
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div wire:ignore.self class="modal fade" id="deleteProductModal" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @if ($product_id)
                                                @livewire('admin.products.delete', [$product_id])
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
