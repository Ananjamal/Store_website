<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="modal-body">
        <div class="mb-3">

            <label for="categories">Choose a Category:</label>

            {{-- <select name="categories" id="categories" wire:model="category_id"> --}}
            {{-- <select class="custom-select" id="categories" wire:model="category_id">
                <option></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select> --}}
            <select name="categories" id="categories" wire:model="product.category_id">
                @foreach($categories as $category)
                    {{--                                    <option value="{{ $category->id }}" {{ $category->id == $product['category_id'] ? 'selected' : '' }}>--}}
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <br>


            @error('category_id')
                <small class="text-danger"> {{ $message }} </small>
            @enderror

        </div>

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" wire:model="product.name" class="form-control">
            @error('name')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>





        <div class="mb-3">
            <label>Image</label>
            <input type="file" wire:model="imageTemp" class="form-control-file"><br>
            @error('imageTemp')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>


        <div class="mb-3">
            <label>Description</label>
            <input type="text" class="form-control" wire:model="product.description">
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label> Price</label>
            <input type="text" class="form-control" wire:model="product.price">
            @error('price')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>




        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" wire:click="update" class="btn btn-primary">Save</button>
        </div>
    </div>

</div>
