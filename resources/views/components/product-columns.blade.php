@props(['products'])

<div class="flex-1 bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">

    <h2 class="text-xl font-semibold text-green-700 mb-4 flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        Можно употреблять
    </h2>

    <x-product-card color="green" :products="$products"></x-product-card>

</div>


<div class="flex-1 bg-white rounded-lg shadow-md p-6 border-r-4 border-red-400">

    <h2 class="text-xl font-semibold text-red-700 mb-4 flex items-center">
        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        Нельзя употреблять
    </h2>

        <x-product-card color="red" :products="$products"></x-product-card>

</div>
