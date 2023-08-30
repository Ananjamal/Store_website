<div>
    {{-- The whole world belongs to you. --}}

    <button wire:click="decreaseQuantity" class="btn btn-link px-2"> <i class="fas fa-minus"></i>
    </button>
    <input type="text" wire:model="quantity" class="form-control">
    <button wire:click="increaseQuantity" class="btn btn-link px-2">
        <i class="fas fa-plus"></i>
    </button>
</div>
