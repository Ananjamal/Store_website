<div >
    {{-- The Master doesn't talk, he acts. --}}
    <select id="orderStatus" class="form-select" wire:model="orderStatus" wire:change="updateOrderStatus">
        <option value= "-1" ></option>
        <option value="pending">Pending</option>
        <option value="processing">Processing</option>
        <option value="shipped">Shipped</option>
        <option value="delivered">Delivered</option>
        <option value="cancelled">Cancelled</option>
    </select>

    @if (session('done'))
        <div class="mt-2">
            <img width="40" height="40" src="https://img.icons8.com/color/48/ok--v1.png" alt="ok--v1" />
        </div>
    @endif
</div>
