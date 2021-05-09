<x-guest-layout>
    <div class="flex">
        <div class="my-5 flex justify-center w-3/4"><h1 class="underline text-5xl">Products</h1></div>
        <div class="my-5 flex justify-center w-1/4"><h1 class="underline text-5xl">Cart</h1></div>
    </div>
    <div class="flex">
        <div class="flex flex-wrap justify-between w-3/4">
            @foreach ($products as $product)
                <livewire:product :product='$product' />
            @endforeach
        </div>
        <livewire:cart />
    </div>
</x-guest-layout>
