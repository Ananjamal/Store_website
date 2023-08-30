
<div>
    {{-- Care about people's approval and you will be their prisoner. --}}


    <div class="modal-body">
        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" wire:model="category.name" class="form-control">
            @error('name')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Description </label>
            <textarea type="text" class="form-control" name="description" wire:model="category.description">

                        </textarea>
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>
        {{-- <img src="{{ $category->image }}" height="100" width="100" --}}
        <div class="mb-3">
            <label>Category Image</label>
            <input type="file" wire:model="category.image" name="imag" id="">
            @error('image')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" wire:click="update" class="btn btn-primary">Save</button>
        </div>
    </div>


</div>
