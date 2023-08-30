<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="modal-body">
        <div class="mb-3">

            <label for="categories">Choose a Category:</label>

            {{-- <select name="categories" id="categories" wire:model="category_id"> --}}
            <select class="custom-select" id="categories" wire:model="category_id">
                <option></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
            <br>
           
            @error('category_id')
                <small class="text-danger"> {{ $message }} </small>
            @enderror

        </div>

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" wire:model="name" class="form-control">
            @error('name')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>





        <div class="mb-3">
            <label>Image</label>
            <input type="file" wire:model="image" class="form-control-file"><br>
            @error('image')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>


        <div class="mb-3">
            <label>Description</label>
            <input type="text" class="form-control" wire:model="description">
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label> Price</label>
            <input type="number" class="form-control" wire:model="price">
            @error('price')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>




        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" wire:click="store()" class="btn btn-primary">Save</button>
        </div>
    </div>

</div>
