<div>

    <div class="modal-body">
        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" wire:model="name" class="form-control">
            @error('name')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Description </label>
            <textarea type="text" class="form-control" name="description" wire:model="description">

                   </textarea>
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Category Image</label>
            <input type="file" wire:model="image" name="" id=""><br>
            @error('image')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" wire:click="store" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
