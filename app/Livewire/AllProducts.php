<?php

namespace App\Livewire;

use App\Actions\GetUserProducts;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AllProducts extends Component
{
    #[Computed]
    public function products()
    {
        return GetUserProducts::run();
    }

    public function render()
    {
        $products = $this->products;

        return view('livewire.product.all-products', compact('products'));
    }

}
