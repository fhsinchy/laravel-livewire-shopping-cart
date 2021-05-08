<x-guest-layout>
    <nav class="p-8 flex justify-between shadow">
        <a class="rounded text-xl" href="#">Shopping Cart</a>
        <div>
            <a class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" href="{{ route('index') }}">Products</a>
            <a class="p-2 border-2 rounded bg-gray-200 hover:bg-gray-300" href="#">Cart</a>
        </div>
    </nav>
    <div class="flex flex-wrap">
        @foreach ($products as $product)
            <livewire:product :product='$product' />
        @endforeach
    </div>
</x-guest-layout>
