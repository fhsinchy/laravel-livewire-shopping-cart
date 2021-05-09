<div class="p-5 mx-2 my-2 max-w-md rounded border-2">
    <h1 class="text-3xl mb-2">{{ $product->name }} - ${{ $product->price }}</h1>
    <p class="text-lg mb-2">{{ $product->description }}</p>
    <input class="mb-2 border-2 rounded" type="number" min="1" wire:model="quantity">
    <button class="p-2 border-2 rounded border-blue-500 hover:border-blue-600 bg-blue-500 hover:bg-blue-600" wire:click="addToCart">Add To Cart</button>
</div>
