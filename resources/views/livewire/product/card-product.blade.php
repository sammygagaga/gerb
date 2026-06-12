<?php

use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component {

    public string $color;

    public Collection $products;

};
?>

<div>

    @foreach($products as $product)
        @if($product['allowed'] == 1)
            @if($color == 'green')

                <ul class="space-y-3">
                    <li class="mb-2">
                        <button
                            wire:click="$dispatch('openModal', { component: 'modals.product-modal', arguments: { product: '{{ $product->slug }}' }})"
                            class="flex items-center w-full p-3 bg-green-50 rounded hover:bg-green-100 transition text-left">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>
                            {{ $product->title }}
                        </button>
                    </li>
                </ul>

            @endif
        @else
            @if($color == 'red')

                <ul class="space-y-3">
                    <li class="mb-2">
                        <button
                            wire:click="$dispatch('openModal', { component: 'modals.product-modal', arguments: { product: '{{ $product->slug }}' }})"
                            class="flex items-center w-full p-3 bg-red-50 rounded hover:bg-red-100 transition text-left">
                            <span class="w-2 h-2 bg-red-500 rounded-full mr-3"></span>
                            {{ $product->title }}
                        </button>
                    </li>
                </ul>

            @endif
        @endif
    @endforeach

</div>
