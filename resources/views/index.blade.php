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
        <div class="w-1/4">
            <div class="p-5 mx-2 my-2 max-w-md rounded border-2">
                <h1 class="text-3xl mb-2">Lorem Ipsum</h1>
                <p class="text-lg mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, laudantium? Animi nemo modi, assumenda tempore quos recusandae. Autem, dicta animi.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
