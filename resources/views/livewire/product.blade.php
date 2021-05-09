<div class="p-5 mx-2 my-2 max-w-md rounded border-2">
    <h1 class="text-3xl mb-2">{{ $product->name }}</h1>
    <p class="text-lg mb-2">{{ $product->description }}</p>
    <input class="mb-2 border-2 rounded w-full" type="number" min="1" max="10" wire:model="quantity">
    <button class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" wire:click="addToCart">Add To Cart</button>
    <button class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" wire:click="removeFromCart">Remove</button>
    <button class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" wire:click="showCart">Show Cart</button>
</div>
