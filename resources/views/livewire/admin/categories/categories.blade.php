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
                            <h6 class="text-white text-capitalize ps-3">Categories Table</h6>
                            <h4>
                                <button wire:click="addCategoryModal" type="button" class="btn btn-success float-end"
                                    data-toggle="modal" data-target="#addCategoryModal">Add Category
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
                                            class="text-center text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Image</th>
                                        <th class="text-uppercase text-secondary text font-weight-bolder opacity-7">
                                            Actions</th>

                                        {{-- <th class="text-secondary opacity-7">Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="px-2 py-1 d-flex">
                                                    {{-- <div>
                                  <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                </div> --}}
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $category->name }}</h6>
                                                        {{-- <p class="mb-0 text-xs text-secondary">john@creative-tim.com</p> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="mb-0 text font-weight-bold">{{ $category->description }}</p>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="text-xs text-secondary font-weight-bold">
                                                    <img src="{{ $category->image }}" height="100" width="100"
                                                        alt="user1">

                                                </span>
                                            </td>
                                            <td>
                                                <button data-toggle="modal" data-target="#updateCategoryModal"
                                                    wire:click="edit_category({{ $category->id }})"
                                                    class="btn btn-danger">
                                                    Edit
                                                </button>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#deleteCategoryModal"
                                                    wire:click="delete_category({{ $category->id }})">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $categories->links() }}

                            <div>

                                {{-- Care about people's approval and you will be their prisoner. --}}

                                <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1"
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
                                            @livewire('admin.categories.create')
                                        </div>
                                    </div>
                                </div>

                                <div wire:ignore.self class="modal fade" id="updateCategoryModal" tabindex="-1"
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


                                <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @if ($category_id)
                                                @livewire('admin.categories.delete', [$category_id])
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
